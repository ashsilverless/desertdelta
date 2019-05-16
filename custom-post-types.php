<?php
/*
// ========= Custom Post Types - Camps, Itineraries, Information ============
*/

add_action( 'init', 'custom_post_type_camps', 0 );
add_action( 'init', 'custom_post_type_itineraries', 0 );
add_action( 'init', 'custom_post_type_information', 0 );

// ====== Camps
function custom_post_type_camps() {

    $labels = array(
        'name'                => _x( 'Camps', 'Post Type General Name',  'desertdelta' ),
        'singular_name'       => _x( 'Camp',  'Post Type Singular Name', 'desertdelta' ),
        'menu_name'           => __( 'Camps',              'desertdelta' ),
        'parent_item_colon'   => __( 'Parent Camp',        'desertdelta' ),
        'all_items'           => __( 'All Camps',          'desertdelta' ),
        'view_item'           => __( 'View Camp',          'desertdelta' ),
        'add_new_item'        => __( 'Add New Camp',       'desertdelta' ),
        'add_new'             => __( 'Add Camp',           'desertdelta' ),
        'edit_item'           => __( 'Edit Camp',          'desertdelta' ),
        'update_item'         => __( 'Update Camp',        'desertdelta' ),
        'search_items'        => __( 'Search Camp',        'desertdelta' ),
        'not_found'           => __( 'Not Found',          'desertdelta' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'desertdelta' )
    );
    
    $args = array(
        'label'               => __( 'camps', 'desertdelta' ),
        'description'         => __( 'Camps', 'desertdelta' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'taxonomies', 'thumbnail' ),
        'menu_icon'           => 'dashicons-admin-multisite',
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
    );
    
    register_post_type( 'camps', $args );
}

// ====== Itineraries
function custom_post_type_itineraries() {

    $labels = array(
        'name'                => _x( 'Itineraries', 'Post Type General Name',  'desertdelta' ),
        'singular_name'       => _x( 'Itinerary',   'Post Type Singular Name', 'desertdelta' ),
        'menu_name'           => __( 'Itineraries',        'desertdelta' ),
        'parent_item_colon'   => __( 'Parent Itinerary',   'desertdelta' ),
        'all_items'           => __( 'All Itineraries',    'desertdelta' ),
        'view_item'           => __( 'View Itinerary',     'desertdelta' ),
        'add_new_item'        => __( 'Add New Itinerary',  'desertdelta' ),
        'add_new'             => __( 'Add Itinerary',      'desertdelta' ),
        'edit_item'           => __( 'Edit Itinerary',     'desertdelta' ),
        'update_item'         => __( 'Update Itinerary',   'desertdelta' ),
        'search_items'        => __( 'Search Itinerary',   'desertdelta' ),
        'not_found'           => __( 'Not Found',          'desertdelta' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'desertdelta' )
    );
    
    $args = array(
        'label'               => __( 'itineraries', 'desertdelta' ),
        'description'         => __( 'Itineraries', 'desertdelta' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'thumbnail' ),
        'menu_icon'           => 'dashicons-calendar',
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
    );
    
    register_post_type( 'itineraries', $args );
}


// ====== Information
function custom_post_type_information() {

    $labels = array(
        'name'                => _x( 'Information', 'Post Type General Name',  'desertdelta' ),
        'singular_name'       => _x( 'Information', 'Post Type Singular Name', 'desertdelta' ),
        'menu_name'           => __( 'Information',         'desertdelta' ),
        'parent_item_colon'   => __( 'Parent Information',  'desertdelta' ),
        'all_items'           => __( 'All Information',     'desertdelta' ),
        'view_item'           => __( 'View Information',    'desertdelta' ),
        'add_new_item'        => __( 'Add New Information', 'desertdelta' ),
        'add_new'             => __( 'Add Information',     'desertdelta' ),
        'edit_item'           => __( 'Edit Information',    'desertdelta' ),
        'update_item'         => __( 'Update Information',  'desertdelta' ),
        'search_items'        => __( 'Search Information',  'desertdelta' ),
        'not_found'           => __( 'Not Found',           'desertdelta' ),
        'not_found_in_trash'  => __( 'Not found in Trash',  'desertdelta' )
    );
    
    $args = array(
        'label'               => __( 'information', 'desertdelta' ),
        'description'         => __( 'Information', 'desertdelta' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'thumbnail', 'editor' ),
        'menu_icon'           => 'dashicons-warning',
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
    );
    
    register_post_type( 'information', $args );
}
