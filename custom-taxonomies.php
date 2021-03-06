<?php
/*
// ========= Custom Taxonomies - Destination ============
*/

add_action( 'init', 'taxonomy_destination', 0 );

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
    
    register_taxonomy( 'destinations', array( 'camps' ), array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'destinations', 'hierarchical' => true )
    ));
}
