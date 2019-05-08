<?php
/*
// ========= Custom Taxonomies - Destination and Package ============
*/

add_action( 'init', 'taxonomy_destination', 0 );
add_action( 'init', 'taxonomy_package', 0 );

// ====== Destination
function taxonomy_destination() {
 
    $labels = array(
        'name'              => _x( 'Destinations', 'taxonomy general name' ),
        'singular_name'     => _x( 'Destination', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Destination'   ),
        'all_items'         => __( 'All Destinations'     ),
        'parent_item'       => __( 'Parent Destination'   ),
        'parent_item_colon' => __( 'Parent Destination:'  ),
        'edit_item'         => __( 'Edit Destination'     ), 
        'update_item'       => __( 'Update Destination'   ),
        'add_new_item'      => __( 'Add New Destination'  ),
        'new_item_name'     => __( 'New Destination Name' ),
        'menu_name'         => __( 'Destinations'         )
    );     
    
    register_taxonomy( 'destination', array( 'camps' ), array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'destination', 'hierarchical' => true )
    ));
}

// ====== Package
function taxonomy_package() {
 
    $labels = array(
        'name'              => _x( 'Packages', 'taxonomy general name'  ),
        'singular_name'     => _x( 'Package', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Package'   ),
        'all_items'         => __( 'All Packages'     ),
        'parent_item'       => __( 'Parent Package'   ),
        'parent_item_colon' => __( 'Parent Package:'  ),
        'edit_item'         => __( 'Edit Package'     ), 
        'update_item'       => __( 'Update Package'   ),
        'add_new_item'      => __( 'Add New Package'  ),
        'new_item_name'     => __( 'New Package Name' ),
        'menu_name'         => __( 'Packages'         )
    );     
    
    register_taxonomy( 'package', array( 'camps' ), array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'package', 'hierarchical' => true )
    ));
}