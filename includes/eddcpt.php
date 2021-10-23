<?php
function set_download_labels($labels) {
	$labels = array(
		'name' => _x('Themes', 'post type general name', 'kevinurielfonsecav2'),
		'singular_name' => _x('Theme', 'post type singular name', 'kevinurielfonsecav2'),
		'add_new' => __('Add New', 'kevinurielfonsecav2'),
		'add_new_item' => __('Add New Theme', 'kevinurielfonsecav2'),
		'edit_item' => __('Edit Theme', 'kevinurielfonsecav2'),
		'new_item' => __('New Theme', 'kevinurielfonsecav2'),
		'all_items' => __('All Themes', 'kevinurielfonsecav2'),
		'view_item' => __('View Theme', 'kevinurielfonsecav2'),
		'search_items' => __('Search Themes', 'kevinurielfonsecav2'),
		'not_found' =>  __('No Themes found', 'kevinurielfonsecav2'),
		'not_found_in_trash' => __('No Themes found in Trash', 'kevinurielfonsecav2'),
		'parent_item_colon' => '',
		'menu_name' => __('Themes', 'kevinurielfonsecav2'),
		'featured_image'        => __( '%1$s Image', 'easy-digital-downloads' ),
		'set_featured_image'    => __( 'Set %1$s Image', 'easy-digital-downloads' ),
		'remove_featured_image' => __( 'Remove %1$s Image', 'easy-digital-downloads' ),
		'use_featured_image'    => __( 'Use as %1$s Image', 'easy-digital-downloads' ),
	);
	return $labels;
}
add_filter('edd_download_labels', 'set_download_labels');
/*
*
* SUPPORT CUSTOM-FIELDS FOR EASY DIGITAL DOWNLOADS
*
*/
add_post_type_support( 'download', 'custom-fields', 'editor' );
/*
*
* DEFINE SLUG FOR EASY DOWNLOADS LOOP PAGE
*
*/
define('EDD_SLUG', 'themes');
/*
*
* DISABLE SESSIONS FOR EASY DOWNLOADS (CART ITEMS WILL NOT BE SAVED ON BROWSER)
*
*/
define( 'EDD_USE_PHP_SESSIONS', false );
