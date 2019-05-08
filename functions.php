<?php
/**
 * desertdelta functions and definitions
 *
 * @package desertdelta
 */

/** = Ditch Junk = */ 

remove_action('wp_head', 'print_emoji_detection_script', 7);

remove_action('wp_print_styles', 'print_emoji_styles');

/** = Enqueue scripts and styles = */ 

function desertdelta_scripts() {
	
	wp_enqueue_style( 'desertdelta-style', get_stylesheet_uri() );

	wp_enqueue_script( 'desertdelta-core-js', get_template_directory_uri() . '/inc/js/compiled.js', array('jquery'), true); 
	
}

add_action( 'wp_enqueue_scripts', 'desertdelta_scripts' );

/**= Add Menus =**/

function sl_custom_menu() {
  register_nav_menus(
    array(
        'main-menu' => __( 'Main Menu' ),
        'footer-menu1' => __( 'Footer Menu 1' ),
        'footer-menu2' => __( 'Footer Menu 2' )
    )
  );
}
add_action( 'init', 'sl_custom_menu' );

/* Dashboard Config */

add_action('wp_dashboard_setup', 'sl_dashboard_widget');
  
function sl_dashboard_widget() {
global $wp_meta_boxes;
 
wp_add_dashboard_widget('custom_help_widget', 'Silverless Support', 'custom_dashboard_help');
}
function custom_dashboard_help() {
?>

<img src="https://silverless.co.uk/wp-content/themes/silverless/images/logo__silverless.svg" style="max-width:100%;
height:auto;"/>

<img src="https://silverless.co.uk/wp-content/uploads/2016/10/icon-screen-delete.svg" style=" display: inline-block; width: 60px; margin: 2em calc(50% - 30px) 1em;"/>

<p>For support or general enquiries please contact us directly at <a href="mailto:hello@silverless.co.uk">hello@silverless.co.uk</a> or call <a href="tel:+44 (0)1672 556532">01672 556532</a></p>
<p>We aim to respond within 60 minutes during hours (Mon to Fri 9am - 5pm)</p>

<?php
}

/* Dashboard Style */

add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '
<style>
#menu-posts-camp .dashicons-admin-post:before{font-family:dashicons;content:"\f102"}#toplevel_page_testimonials .dashicons-admin-generic:before{font-family:dashicons;content:"\f101"}#toplevel_page_call-to-action .dashicons-admin-generic:before{font-family:dashicons;content:"\f488"}.taxonomy-where tr.form-field.term-description-wrap,body.taxonomy-what .form-field.term-description-wrap,body.taxonomy-when .form-field.term-description-wrap,body.taxonomy-where .form-field.term-description-wrap{display:none}#wpcontent,#wpfooter,#wpwrap{background:#cdc7c0}#adminmenu,#adminmenu .wp-submenu,#adminmenuback,#adminmenuwrap,#wpadminbar{background-color:#362b3a}#adminmenu .wp-has-current-submenu .wp-submenu,#adminmenu .wp-has-current-submenu .wp-submenu.sub-open,#adminmenu .wp-has-current-submenu.opensub .wp-submenu,#adminmenu a.wp-has-current-submenu:focus+.wp-submenu,.no-js li.wp-has-current-submenu:hover .wp-submenu{background-color:#302036}#adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head,#adminmenu .wp-menu-arrow,#adminmenu .wp-menu-arrow div,#adminmenu li.current a.menu-top,#adminmenu li.wp-has-current-submenu a.wp-has-current-submenu,.folded #adminmenu li.current.menu-top,.folded #adminmenu li.wp-has-current-submenu{background:#312036;color:#e57732}ul#adminmenu a.wp-has-current-submenu:after,ul#adminmenu>li.current>a.current:after{border-right-color:#cdc7c0}#adminmenu .wp-submenu a:focus,#adminmenu .wp-submenu a:hover,#adminmenu a:hover,#adminmenu li.menu-top>a:focus{color:#e4652f}

.post-type-page .acf-postbox {
  background: hsl(283, 14%, 20%);
  border-color: hsl(283, 14%, 20%);
}

.post-type-page #poststuff h2 {
  font-size: 14px;
  color: hsl(32, 12%, 78%);
  border:none;
  }

.post-type-page .acf-fields>.acf-field {
  border-color: hsl(30, 9%, 71%) !important;
}

.post-type-page .acf-flexible-content .layout {
  background: hsl(32, 12%, 78%);
  border: none;
  margin-bottom:50px;
}

.post-type-page .acf-flexible-content .layout .acf-fc-layout-handle {
    font-size:18px;
    text-transform:uppercase;
    font-weight:900;}

.post-type-page .acf-flexible-content .layout .acf-fc-layout-order {
  background: hsl(15, 73%, 46%);
  font-size: 12px;
  color: hsl(0, 0%, 100%);
}

.post-type-page .acf-flexible-content .no-value-message {
  color: hsl(0, 0%, 100%);
}

.post-type-page .inside.acf-fields > .acf-field > .acf-label {
    color: hsl(0, 0%, 100%);
    text-transform: uppercase;
    font-size: 24px;
    }

</style>';
}

/**
 * ACF Options Pages.
 */
 
 if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'site-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_page(array(
		'page_title' 	=> 'Call To Action',
		'menu_title'	=> 'Call To Action',
		'menu_slug' 	=> 'call-to-action',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_page(array(
		'page_title' 	=> 'Testimonials',
		'menu_title'	=> 'Testimonials',
		'menu_slug' 	=> 'testimonials',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}
 
/**= Remove Default Menu Items =**/
 
function remove_menus(){

  remove_menu_page( 'edit-comments.php' );          //Comments
  
}
add_action( 'admin_menu', 'remove_menus' );

/**= Allow SVG Upload =**/

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/**= Set WooCommerce Theme Support =**/

add_action( 'after_setup_theme', function() {
	add_theme_support( 'woocommerce' );
} );

/**= WooCommerce - Custom Quantity Fields =**/

add_action( 'wp_footer' , 'custom_quantity_fields_script' );
function custom_quantity_fields_script(){
    ?>
    <script type='text/javascript'>
    jQuery( function( $ ) {
        if ( ! String.prototype.getDecimals ) {
            String.prototype.getDecimals = function() {
                var num = this,
                    match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
                if ( ! match ) {
                    return 0;
                }
                return Math.max( 0, ( match[1] ? match[1].length : 0 ) - ( match[2] ? +match[2] : 0 ) );
            }
        }
        // Quantity "plus" and "minus" buttons
        $( document.body ).on( 'click', '.plus, .minus', function() {
            var $qty        = $( this ).closest( '.quantity' ).find( '.qty'),
                currentVal  = parseFloat( $qty.val() ),
                max         = parseFloat( $qty.attr( 'max' ) ),
                min         = parseFloat( $qty.attr( 'min' ) ),
                step        = $qty.attr( 'step' );

            // Format values
            if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
            if ( max === '' || max === 'NaN' ) max = '';
            if ( min === '' || min === 'NaN' ) min = 0;
            if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

            // Change the value
            if ( $( this ).is( '.plus' ) ) {
                if ( max && ( currentVal >= max ) ) {
                    $qty.val( max );
                } else {
                    $qty.val( ( currentVal + parseFloat( step )).toFixed( step.getDecimals() ) );
                }
            } else {
                if ( min && ( currentVal <= min ) ) {
                    $qty.val( min );
                } else if ( currentVal > 0 ) {
                    $qty.val( ( currentVal - parseFloat( step )).toFixed( step.getDecimals() ) );
                }
            }

            // Trigger change event
            $qty.trigger( 'change' );
        });
    });
    </script>
    <?php
}

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**= WooCommerce - Custom Customer Message in Checkout =**/

function md_custom_woocommerce_checkout_fields( $fields ) 
{
    $fields['order']['order_comments']['placeholder'] = 'Pop any info you need us to know in here, please';

    return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'md_custom_woocommerce_checkout_fields' );

/**= Social Sharing Buttons =**/

function desertdelta_social_sharing_buttons($content) {
	global $post;
	if(is_singular() || is_home()){
	
		// Get current page URL 
		$desertdeltaURL = urlencode(get_permalink());
 
		// Get current page title
		$desertdeltaTitle = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
		// $desertdeltaTitle = str_replace( ' ', '%20', get_the_title());
		
		// Get Post Thumbnail for pinterest
		$desertdeltaThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
 
		// Construct sharing URL without using any script
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$desertdeltaTitle.'&amp;url='.$desertdeltaURL.'&amp;via=Crunchify';
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$desertdeltaURL;
 
		// Based on popular demand added Pinterest too
		$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$desertdeltaURL.'&amp;media='.$desertdeltaThumbnail[0].'&amp;description='.$desertdeltaTitle;
 
		// Add sharing button at the end of page/page content
		$content .= '<!-- Implement your own superfast social sharing buttons without any JavaScript loading. No plugin required. Detailed steps here: http://crunchify.me/1VIxAsz -->';
		$content .= '<div class="contactSocials"><h5 class="heading heading__sm">SHARE </h5>';
		$content .= ' <a href="'. $twitterURL .'" target="_blank"><i class="fab fa-twitter"></i></a>';
		$content .= '<a href="'.$facebookURL.'" target="_blank"><i class="fab fa-facebook-square"></i></a>';
		$content .= '</div>';
		
		return $content;
	}else{
		// if not a post/page then don't include sharing button
		return $content;
	}
};
//add_filter( 'the_content', 'desertdelta_social_sharing_buttons');

/**= Add Custom Post Types and Taxonomies =**/

require_once ('custom-post-types.php');

require_once ('custom-taxonomies.php');

/**= Filter Custom Type Job =**/

function template_chooser($template) {    
	global $wpdb;
	
	global $wp_query;
	
	$post_type = get_query_var('post_type');
	
	if( $wp_query->is_search && $post_type == 'job' ) {
		
		$job = get_query_var('s');
		
		$location = get_query_var('location');
	
		$salary = $_GET['salary'];
		
		$tax_query = array(
			"relation" => "AND"
		);
		
		if($location) {
			$locationID = get_terms([
			    'name__like' => $location,
			    'fields' => 'ids'
			]);
			
			array_push($tax_query,
				array(
		            'taxonomy' => 'location',
		            'field'    => 'id',
		            'terms'    => $locationID,
		        )
		    );
		}
		
		if($salary) {
			array_push($tax_query,
				array(
		            'taxonomy' => 'salary-range',
		            'field'    => 'slug',
		            'terms'    => $salary,
		        )
		    );
		}
		
		$posts = $wpdb->get_results("
			SELECT SQL_CALC_FOUND_ROWS $wpdb->posts.ID
			FROM $wpdb->posts
			INNER JOIN $wpdb->postmeta ON ($wpdb->posts.ID = $wpdb->postmeta.post_id)
			WHERE 1=1
			  AND (UPPER($wpdb->posts.post_title) LIKE UPPER('%$job%')
				  OR ($wpdb->postmeta.meta_key = 'description' AND UPPER($wpdb->postmeta.meta_value) LIKE UPPER('%$job%')))
			  AND $wpdb->posts.post_type = 'job'
			  AND ($wpdb->posts.post_status = 'publish'
			       OR $wpdb->posts.post_status = 'acf-disabled'
			       OR $wpdb->posts.post_status = 'private')
			GROUP BY $wpdb->posts.ID"
		);
		
		$ids = array_map(function($post){
			return $post->ID;
		}, $posts);
		
		
		if(sizeof($ids) > 0) {
		
			$wp_query->query(
				array(
					'post__in'  => $ids,
					'post_type' => $post_type,
				    'tax_query' => $tax_query
				)
			);
		}
	}
	
	return $template;
}

add_filter('template_include', 'template_chooser');  

/*********************
* re-order left admin menu
**********************/
function reorder_admin_menu( $__return_true ) {
    return array(
		'index.php',                        // Dashboard
		'edit.php?post_type=camps', // Camps
		'separator1',                       // --Space--
		'edit.php',                         // Posts
		'edit.php?post_type=page', // Pages
		'upload.php',                       // Media
		'separator2',                       // --Space--
		'themes.php',                       // Appearance
		'plugins.php',                      // Plugins
		'users.php',                        // Users
		'tools.php',                        // Tools
		'options-general.php',              // Settings
		'wpcf7',                            // Contact Form 7 

   );
}
add_filter( 'custom_menu_order', 'reorder_admin_menu' );
add_filter( 'menu_order', 'reorder_admin_menu' );

/*
* Remove top level and sub menu admin menus
*/
function remove_admin_menus() {
   remove_menu_page( 'edit-comments.php' ); // Comments
   remove_menu_page( 'tools.php' ); // Tools
}
add_action( 'admin_menu', 'remove_admin_menus' );
