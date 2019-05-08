<?php
/*
// ========= Custom Post Types (destination, accommodation, package) ============
*/

add_action( 'init', 'custom_post_type_accommodation', 0 );
add_action( 'init', 'custom_post_type_destination', 0 );
add_action( 'init', 'custom_post_type_package', 0 );

// ====== Accommodation
function custom_post_type_accommodation() {
	
    $labels = array(
        'name'                => _x( 'Accommodations', 'Post Type General Name',  'desertdelta' ),
        'singular_name'       => _x( 'Accommodation',  'Post Type Singular Name', 'desertdelta' ),
        'menu_name'           => __( 'Accommodations',        'desertdelta' ),
        'parent_item_colon'   => __( 'Parent Accommodations', 'desertdelta' ),
        'all_items'           => __( 'All Accommodations',    'desertdelta' ),
        'view_item'           => __( 'View Accommodations',   'desertdelta' ),
        'add_new_item'        => __( 'Add New Accommodation', 'desertdelta' ),
        'add_new'             => __( 'Add Accommodation',     'desertdelta' ),
        'edit_item'           => __( 'Edit Accommodation',    'desertdelta' ),
        'update_item'         => __( 'Update Accommodation',  'desertdelta' ),
        'search_items'        => __( 'Search Accommodation',  'desertdelta' ),
        'not_found'           => __( 'Not Found',             'desertdelta' ),
        'not_found_in_trash'  => __( 'Not found in Trash',    'desertdelta' )
    );
    
    $args = array(
        'label'               => __( 'accommodation', 'desertdelta' ),
        'description'         => __( 'Accommodation', 'desertdelta' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'taxonomies' ),
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
    
    register_post_type( 'accommodation', $args );
}

// ====== Destination
function custom_post_type_destination() {
	
    $labels = array(
        'name'                => _x( 'Destinations', 'Post Type General Name',  'desertdelta' ),
        'singular_name'       => _x( 'Destination',  'Post Type Singular Name', 'desertdelta' ),
        'menu_name'           => __( 'Destinations',        'desertdelta' ),
        'parent_item_colon'   => __( 'Parent Destinations', 'desertdelta' ),
        'all_items'           => __( 'All Destinations',    'desertdelta' ),
        'view_item'           => __( 'View Destinations',   'desertdelta' ),
        'add_new_item'        => __( 'Add New Destination', 'desertdelta' ),
        'add_new'             => __( 'Add Destination',     'desertdelta' ),
        'edit_item'           => __( 'Edit Destination',    'desertdelta' ),
        'update_item'         => __( 'Update Destination',  'desertdelta' ),
        'search_items'        => __( 'Search Destination',  'desertdelta' ),
        'not_found'           => __( 'Not Found',           'desertdelta' ),
        'not_found_in_trash'  => __( 'Not found in Trash',  'desertdelta' )
    );
    
    $args = array(
        'label'               => __( 'destination', 'desertdelta' ),
        'description'         => __( 'Destination', 'desertdelta' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'taxonomies' ),
        'menu_icon'           => 'dashicons-location-alt',
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
    
    register_post_type( 'destination', $args );
}

// ====== Package
function custom_post_type_package() {
	
    $labels = array(
        'name'                => _x( 'Packages', 'Post Type General Name',  'desertdelta' ),
        'singular_name'       => _x( 'Package',  'Post Type Singular Name', 'desertdelta' ),
        'menu_name'           => __( 'Packages',           'desertdelta' ),
        'parent_item_colon'   => __( 'Parent Packages',    'desertdelta' ),
        'all_items'           => __( 'All Packages',       'desertdelta' ),
        'view_item'           => __( 'View Packages',      'desertdelta' ),
        'add_new_item'        => __( 'Add New Package',    'desertdelta' ),
        'add_new'             => __( 'Add Package',        'desertdelta' ),
        'edit_item'           => __( 'Edit Package',       'desertdelta' ),
        'update_item'         => __( 'Update Package',     'desertdelta' ),
        'search_items'        => __( 'Search Package',     'desertdelta' ),
        'not_found'           => __( 'Not Found',          'desertdelta' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'desertdelta' )
    );
    
    $args = array(
        'label'               => __( 'package', 'desertdelta' ),
        'description'         => __( 'Package', 'desertdelta' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'taxonomies' ),
        'menu_icon'           => 'dashicons-palmtree',
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
    
    register_post_type( 'package', $args );
}
