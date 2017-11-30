<?php 
// enqueue scripts and declare variable to access to admin ajax url
function yomee_assets() {
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js',false,'1.1','all');
	wp_localize_script( 'main', 'wpInfos',
	array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}

add_action( 'wp_enqueue_scripts', 'yomee_assets' );