<?php
	
$args = array(
	'numberposts' => -1,
	'post_type'   => 'camps'
);
$allCamps = get_posts( $args );

$camps = array();

foreach($allCamps as $camp) {
	
	$camps[$camp->post_name] = array(
		"title_camp"  => $camp->post_title,
		"link"        => get_permalink($camp->ID),
		"destination" => get_the_terms($camp->ID, 'destinations')[0]->name,
		"description" => substr(wp_strip_all_tags(get_field("description", $camp->ID), true), 0, 110) . "...",
		"image"       => wp_get_attachment_image_src( get_post_thumbnail_id($camp->ID), 'medium' )[0]
	);
}

?>

<div class="map camps" <?php printf('camps="%s"', htmlspecialchars(json_encode($camps), ENT_QUOTES, 'UTF-8')); ?>>
	
	<?php if($post->post_type == "itineraries" && get_query_var('pagename') != "itineraries"): ?>
	
	<div id="view-route" class="button">
		<?php include(get_template_directory() . '/inc/img/itinerary-icon.svg'); ?>
		<span>View route</span>
	</div>
	
	<?php endif; ?>

	<div class="popup">
		
		<div class="content">
			
			<div class="img">
    			<a href="<?php echo $link; ?>"></a>
    			<i class="fas fa-times close-popup"></i>
            </div>
			
			<div class="pb2 pt1 pl2 pr2">
				
				<a href="<?php echo $link; ?>"><h2 class="heading heading__sm slide-up"></h2></a>
				
				<span></span>
				
				<p></p>
				
				<a class="button" href="http://desert---delta.local/camps/camp-moremi/">Read more</a>
				
			</div>
			
		</div>
		
		<div class="path-dotted"></div>
		
	</div>
	
	<div class="path-dotted-small"></div>
	
    <img src="<?php echo get_template_directory_uri(); ?>/inc/img/ddmastermap.jpg"/>
 
 
	<!-- MAP -->
	
	<div class="map-wrapper">
		
		<?php get_template_part("template-parts/map/map-regions"); ?>
		
		<canvas id="map-canvas"></canvas>
		
		<?php get_template_part("template-parts/map/map-info"); ?>
		
	</div>

</div>
	