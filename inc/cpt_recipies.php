<?php
$post_type = "recettes";
$labels = array(
	'name'               => 'Recettes',
	'singular_name'      => 'Recette',
	'all_items'          => 'Toutes les recettes',
	'add_new'            => 'Ajouter une recette',
	'add_new_item'       => 'Ajouter une recette',
	'edit_item'          => "Modifier la recette",
	'new_item'           => 'Nouvelle recette',
	'view_item'          => "Voir la recette",
	'search_items'       => 'Trouver une recette',
	'not_found'          => 'Pas de résultats',
	'not_found_in_trash' => 'Pas de résultats',
	'parent_item_colon'  => 'Recette parente :',
	'menu_name'          => 'Recettes',
);

$args = array(
	'labels'              => $labels,
	'hierarchical'        => false,
	'supports'            => array( 'title','editor'),
	'public'              => true,
	'show_ui'             => true,
	'show_in_menu'        => true,
	'menu_position'       => 5,
	'menu_icon'           => 'dashicons-carrot',
	'show_in_nav_menus'   => true,
	'publicly_queryable'  => true,
	'exclude_from_search' => false,
	'has_archive'         => false,
	'query_var'           => true,
	'can_export'          => true,
	'rewrite'             => array( 'slug' => $post_type )
);

register_post_type($post_type, $args );

$taxonomy = "type";
$object_type = array("recettes");
$args = array(
	'label' => __( 'Type' ),
	'rewrite' => array( 'slug' => 'type' ),
	'hierarchical' => true,
);

register_taxonomy( $taxonomy, $object_type, $args );

?>