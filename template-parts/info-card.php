<div class="info-card slide-up">
	
	<?php
		
	if($destinations_taxonomy) {
		$id      = $destinations_taxonomy->term_id;
		$title   = $destinations_taxonomy->name;
		$image   = get_field("image", $destinations_taxonomy)["url"];
		$content = get_field("description", $destinations_taxonomy);
		$link    = get_term_link($id);
		$slug    = $destinations_taxonomy->slug;
		
	} else if($post) {
		$id      = $post->ID;
		$title   = $post->post_title;
		$image   = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' )[0];
		$content = $post->post_content ? $post->post_content : get_field("description", $post->ID);
		$link    = get_permalink( $id );
	}
	
	?>
		
	<img src="<?php echo $image; ?>"/>
	
	<div>
		
		<div class="info-card__text mt2 ml3 mr3">
			
			<?php if($date): ?>
			
			<span class="mb1"><?php echo get_the_date( 'j F Y', $id ); ?></span>
			
			<?php elseif($location): $destination = get_the_terms($post->ID, 'destinations')[0]; ?>
			
			<span class="mb1"><?php echo $destination->name; ?></span>
			
			<?php endif; ?>
			
			<h3 class="heading"><?php echo $title; ?></h3>
				
			<p><?php echo wp_strip_all_tags(substr($content, 0, 150) . "...", true); ?></p>
		
		</div>
			
		<a class="info-read-more" href="<?php echo $link; ?>">Read More</a>
		
		<?php
			
		if($destinations_taxonomy):
		
		$args = array(
			'numberposts' => -1,
			'post_type'   => 'camps',
			'tax_query' => array(
				array(
					'taxonomy' => 'destinations',
					'field'    => 'slug',
					'terms'    => $slug
				)
			)
		);
		$camps = get_posts( $args ); ?>
			
		<?php foreach($camps as $camp): ?>
		
		<a class="button" href="<?php echo get_permalink($camp->ID); ?>"><i class="fas fa-campground"></i><?php echo $camp->post_title; ?></a>
		
		<?php endforeach; endif; ?>
		
	</div>
		
</div>
