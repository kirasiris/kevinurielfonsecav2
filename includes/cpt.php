<?php
/*
*
* PORTFOLIO CPT
*
*/
function custom_snippet_type() {
// Set UI labels for Custom Post Type
    $snippet_labels = array(
        'name'                => _x( 'Snippets', 'Post Type General Name', 'kevinurielfonsecav2' ),
        'singular_name'       => _x( 'Snippet', 'Post Type Singular Name', 'kevinurielfonsecav2' ),
        'menu_name'           => __( 'Snippets', 'kevinurielfonsecav2' ),
        'name_admin_bar'      => __( 'Snippet', 'kevinurielfonsecav2' ),
        'archives'            => __( 'Snippets Archive', 'kevinurielfonsecav2' ),
        'attributes'          => __( 'Snippet Attributes', 'kevinurielfonsecav2' ),
        'parent_item_colon'   => __( 'Parent Snippet', 'kevinurielfonsecav2' ),
        'all_items'           => __( 'All Snippets', 'kevinurielfonsecav2' ),
        'add_new_item'        => __( 'Add New Snippet', 'kevinurielfonsecav2' ),
        'add_new'             => __( 'Add Snippet', 'kevinurielfonsecav2' ),
        'new_item'            => __( 'New Item', 'kevinurielfonsecav2' ),
        'edit_item'           => __( 'Edit Snippet', 'kevinurielfonsecav2' ),
        'update_item'         => __( 'Update Snippet', 'kevinurielfonsecav2' ),
        'view_item'           => __( 'View Snippet', 'kevinurielfonsecav2' ),
        'view_items'          => __( 'View Snippets', 'kevinurielfonsecav2' ),
        'search_items'        => __( 'Search Snippets', 'kevinurielfonsecav2' ),
        'not_found'           => __( 'Not Found', 'kevinurielfonsecav2' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'kevinurielfonsecav2' ),
        'featured_image'      => __( 'Featured Image', 'kevinurielfonsecav2' ),
        'set_featured_image'  => __( 'Set featured image', 'kevinurielfonsecav2' ),
        'remove_featured_image' => __( 'Remove featured image', 'kevinurielfonsecav2' ),
        'use_featured_image'    => __( 'Use as featured image', 'kevinurielfonsecav2' ),
        'insert_into_item'      => __( 'Insert into item', 'kevinurielfonsecav2' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'kevinurielfonsecav2' ),
        'items_list'            => __( 'Items list', 'kevinurielfonsecav2' ),
        'items_list_navigation' => __( 'Items list navigation', 'kevinurielfonsecav2' ),
        'filter_items_list'     => __( 'Filter items list', 'kevinurielfonsecav2' ),
      );

// Set other options for Custom Post Type

    $snippet_args = array(
        'label'               => __( 'snippets', 'kevinurielfonsecav2' ),
        'description'         => __( 'Snippet Templates', 'kevinurielfonsecav2' ),
        'labels'              => $snippet_labels,
        'show_in_rest'        => true, // Necessary for Gutember to work in a CPT
        // Features this CPT supports in Post Editor
        'supports'            =>  array(
                                    'title',
                                    'editor',
                                    'author',
                                    'thumbnail',
                                    'excerpt',
                                    'trackbacks',
                                    'custom-fields',
                                    'comments',
                                    'revisions',
                                    'post-formats'
                                  ),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies'          => array( 'snippet_categories'),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'menu_icon'           => 'dashicons-editor-code',
    );

    // Registering your Custom Post Type
    register_post_type( 'snippets', $snippet_args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action( 'init', 'custom_snippet_type', 0 );
/*
*
* PORTFOLIO CUSTOM CATEGORY TAXONOMY
*
*/
function snippet_categories_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $snippet_cats = array(
    'name' => _x( 'Snippet Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Snippet Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Snippet Categories' ),
    'all_items' => __( 'All Snippet Categories' ),
    'parent_item' => __( 'Parent Snippet Category' ),
    'parent_item_colon' => __( 'Parent Snippet Category:' ),
    'edit_item' => __( 'Edit Snippet Category' ),
    'update_item' => __( 'Update Snippet Category' ),
    'add_new_item' => __( 'Add New Snippet Category' ),
    'new_item_name' => __( 'New Snippet Category' ),
    'menu_name' => __( 'Snippet Categories' ),
  );

// Now register the taxonomy
  register_taxonomy('snippet_categories',array('snippets'), array(
    'hierarchical' => true,
    'labels' => $snippet_cats,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'show_in_rest' => true, // Necessary for Gutember to work in a CPT
    'rewrite' => array( 'slug' => 'snippet_categories' ),
  ));

}
add_action( 'init', 'snippet_categories_taxonomy', 0 );
/*
*
* PORTFOLIO CUSTOM TAGS TAXONOMY
*
*/
function snippet_tags_taxonomy() {
// Labels part for the GUI

  $snippet_tags = array(
    'name' => _x( 'Snippet Tags', 'taxonomy general name' ),
    'singular_name' => _x( 'Snippet Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Snippet Tags' ),
    'popular_items' => __( 'Popular Snippet Tags' ),
    'all_items' => __( 'All Snippet Tags' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Snippet Tag' ),
    'update_item' => __( 'Update Snippet Tag' ),
    'add_new_item' => __( 'Add New Snippet Tag' ),
    'new_item_name' => __( 'New Snippet Tag Name' ),
    'separate_items_with_commas' => __( 'Separate snippet tags with commas' ),
    'add_or_remove_items' => __( 'Add or remove snippet tags' ),
    'choose_from_most_used' => __( 'Choose from the most used snippet tags' ),
    'menu_name' => __( 'Snippet Tags' ),
  );

// Now register the non-hierarchical taxonomy like tag

  register_taxonomy('snippet_tags',array('snippets'),array(
    'hierarchical' => false,
    'labels' => $snippet_tags,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'show_in_rest'        => true, // Necessary for Gutember to work in a CPT
    'rewrite' => array( 'slug' => 'snippet_tags' ),
  ));
}
add_action( 'init', 'snippet_tags_taxonomy', 0 );
