<?php
	// create and reference our header
	function add_menu() {
		register_nav_menu( 'header', 'Menu entête' );
	}
	add_action( 'after_setup_theme', 'add_menu' );

	// filter the menu to add a close btn in mobile
	function add_last_nav_item($items) {
		return $items .= '<i class="fa fa-times menu__handler menu__handler-close" aria-hidden="true"></i>';
	}
	add_filter('wp_nav_menu_items','add_last_nav_item');
?>