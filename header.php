<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title><?php bloginfo( 'name' ); ?></title>
		<!-- Theme stylesheet -->
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
		<link rel="apple-touch-icon" sizes="180x180" href="<?=get_template_directory_uri()?>/assets/favicons/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?=get_template_directory_uri()?>/assets/favicons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?=get_template_directory_uri()?>/assets/favicons/favicon-16x16.png">
		<link rel="manifest" href="<?=get_template_directory_uri()?>/assets/favicons/manifest.json">
		<link rel="mask-icon" href="<?=get_template_directory_uri()?>/assets/favicons/safari-pinned-tab.svg" color="#5bbad5">
		<link rel="shortcut icon" href="<?=get_template_directory_uri()?>/assets/favicons/favicon.ico">
		<meta name="msapplication-config" content="<?=get_template_directory_uri()?>/assets/favicons/browserconfig.xml">
		<meta name="theme-color" content="#ffffff">
		<!-- All wp adding for head section -->
		<?php wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css',false,'1.1','all');?>
		<?php wp_enqueue_script( 'font-awesome', 'https://use.fontawesome.com/2a17cf0deb.js',false,'1.1','all');?>
		<?php wp_head(); ?>
	</head>
	<!-- All wp classes giving by wordpress -->
	<body <?php body_class(); ?> style="background-image:url('<?=get_template_directory_uri()?>/assets/images/background.jpg')">
		<header class="header">
			<a href="<?= pll_home_url() ?>">	<img src="<?=get_template_directory_uri() .'/assets/images/logo-simple.png'?>" alt="Yomee logo"></a>
		<?php
			$args=array(
				'theme_location' => 'header', // nom du slug
				'menu' => 'header_fr', // nom à donner cette occurence du menu
				'menu_class' => 'menu_header', // class à attribuer au menu
				'menu_id' => 'menu_id', // id à attribuer au menu
				'container_class' => 'menu-header-container'
			);
			wp_nav_menu($args);
		?>
			<i class="fa fa-bars menu__handler menu__handler-open" aria-hidden="true"></i>
		</header>