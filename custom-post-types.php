<?php
/*
// ========= Custom Post Types - Job and Candidate ============
*/

add_action( 'init', 'custom_post_type_job', 0 );
add_action( 'init', 'custom_post_type_candidate', 0 );

// ====== Job
function custom_post_type_job() {
	
    $labels = array(
        'name'                => _x( 'Jobs', 'Post Type General Name',  'desertdelta' ),
        'singular_name'       => _x( 'Job',  'Post Type Singular Name', 'desertdelta' ),
        'menu_name'           => __( 'Jobs',        'desertdelta' ),
        'parent_item_colon'   => __( 'Parent Jobs', 'desertdelta' ),
        'all_items'           => __( 'All Jobs',    'desertdelta' ),
        'view_item'           => __( 'View Jobs',   'desertdelta' ),
        'add_new_item'        => __( 'Add New Job', 'desertdelta' ),
        'add_new'             => __( 'Add Job',     'desertdelta' ),
        'edit_item'           => __( 'Edit Job',    'desertdelta' ),
        'update_item'         => __( 'Update Job',  'desertdelta' ),
        'search_items'        => __( 'Search Jobs', 'desertdelta' ),
        'not_found'           => __( 'Not Found',   'desertdelta' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'desertdelta' )
    );
    
    $args = array(
        'label'               => __( 'job', 'desertdelta' ),
        'description'         => __( 'Job', 'desertdelta' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'taxonomies' ),
        'taxonomies'          => array( 'job' ),
        'menu_icon'			  => 'dashicons-clipboard',
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 110,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
    );
    register_post_type( 'job', $args );
}

// ====== Candidate
function custom_post_type_candidate() {
	
    $labels = array(
        'name'                => _x( 'Candidates', 'Post Type General Name', 'desertdelta' ),
        'singular_name'       => _x( 'Candidate',  'Post Type Singular Name', 'desertdelta' ),
        'menu_name'           => __( 'Candidates',         'desertdelta' ),
        'parent_item_colon'   => __( 'Parent Candidates',  'desertdelta' ),
        'all_items'           => __( 'All Candidates',     'desertdelta' ),
        'view_item'           => __( 'View Candidates',    'desertdelta' ),
        'add_new_item'        => __( 'Add New Candidate',  'desertdelta' ),
        'add_new'             => __( 'Add Candidate',      'desertdelta' ),
        'edit_item'           => __( 'Edit Candidate',     'desertdelta' ),
        'update_item'         => __( 'Update Candidate',   'desertdelta' ),
        'search_items'        => __( 'Search Candidates',  'desertdelta' ),
        'not_found'           => __( 'Not Found',          'desertdelta' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'desertdelta' )
    );
    
    $args = array(
        'label'               => __( 'candidate', 'desertdelta' ),
        'description'         => __( 'Candidate', 'desertdelta' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'taxonomies' ),
        'taxonomies'          => array( 'candidate' ),
        'menu_icon'			  => 'dashicons-businessman',
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 110,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
        
    );
    register_post_type( 'candidate', $args );
}
