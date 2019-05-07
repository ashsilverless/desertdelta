<?php
/*
// ========= Job and Candidate Custom Taxonomies (type, location, salary-range) ============
*/

//add_action( 'init', 'type_cpt_taxonomy', 0 );
//add_action( 'init', 'location_cpt_taxonomy', 0 );
//add_action( 'init', 'salary_range_cpt_taxonomy', 0 );

// ====== Type
function type_cpt_taxonomy() {
 
    $labels = array(
        'name'              => _x( 'Type', 'taxonomy general name' ),
        'singular_name'     => _x( 'Type', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Type'   ),
        'all_items'         => __( 'All Types'     ),
        'parent_item'       => __( 'Parent Type'   ),
        'parent_item_colon' => __( 'Parent Type:'  ),
        'edit_item'         => __( 'Edit Type'     ), 
        'update_item'       => __( 'Update Type'   ),
        'add_new_item'      => __( 'Add New Type'  ),
        'new_item_name'     => __( 'New Type Name' ),
        'menu_name'         => __( 'Types'         )
    );     
    
    register_taxonomy( 'type', array( 'job', 'candidate' ), array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'             => array( 'slug' => 'type', 'hierarchical' => true )
    ));
}

// ====== Location
function location_cpt_taxonomy() {
 
    $labels = array(
        'name'              => _x( 'Location', 'taxonomy general name'  ),
        'singular_name'     => _x( 'Location', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Location'   ),
        'all_items'         => __( 'All Locations'     ),
        'parent_item'       => __( 'Parent Location'   ),
        'parent_item_colon' => __( 'Parent Location:'  ),
        'edit_item'         => __( 'Edit Location'     ), 
        'update_item'       => __( 'Update Location'   ),
        'add_new_item'      => __( 'Add New Location'  ),
        'new_item_name'     => __( 'New Location Name' ),
        'menu_name'         => __( 'Locations'         )
    );     
    
    register_taxonomy( 'location', array( 'job', 'candidate' ), array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'location', 'hierarchical' => true )
    ));
}

// ====== Salary Range
function salary_range_cpt_taxonomy() {
 
    $labels = array(
        'name'              => _x( 'Salary Range', 'taxonomy general name'  ),
        'singular_name'     => _x( 'Salary Range', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Salary Range'   ),
        'all_items'         => __( 'All Salary Ranges'     ),
        'parent_item'       => __( 'Parent Salary Range'   ),
        'parent_item_colon' => __( 'Parent Salary Range:'  ),
        'edit_item'         => __( 'Edit Salary Range'     ), 
        'update_item'       => __( 'Update Salary Range'   ),
        'add_new_item'      => __( 'Add New Salary Range'  ),
        'new_item_name'     => __( 'New Salary Range Name' ),
        'menu_name'         => __( 'Salary Ranges'         )
    );     
    
    register_taxonomy( 'salary-range', array( 'job', 'candidate' ), array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'salary-range', 'hierarchical' => true )
    ));
}
