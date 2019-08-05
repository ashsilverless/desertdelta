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
		
		$content = "";
		if($post->post_content)
			$content = $post->post_content;
		else if(get_field("description", $post->ID))
			$content = get_field("description", $post->ID);
		else if(get_field("introduction_text", $post->ID))
			$content = get_field("introduction_text", $post->ID);
			
		$link    = get_permalink( $id );
	}
	
	?>
	
	<?php if($image_as_background): ?>
	
	<div class="img" style="background-image: url(<?php echo $image; ?>);"></div>
	
	<?php else: ?>
	
	<img src="<?php echo $image; ?>"/>
	
	<?php endif; ?>
	
	<div>
		
		<div class="info-card__text mt2 ml3 mr3">
			
			<?php if($date): ?>
			
			<span class="mb1"><?php echo get_the_date( 'j F Y', $id ); ?></span>
			
			<?php elseif($location): $destination = get_the_terms($post->ID, 'destinations')[0]; ?>
			
			<span class="mb1"><?php echo $destination->name; ?></span>
			
			<?php endif; ?>
			
            <div class="camp-activities">
                <?php if( have_rows('activities') ):?>
            
                <div class="row"> 	
            
                    <?php while ( have_rows('activities') ) : the_row();
                        $activityIcon   = get_sub_field("icon")["url"];	?>
            
                        <div class="camp-activities__icon">
                            <?php echo file_get_contents($activityIcon); ?>
                            <p><?php the_sub_field('title'); ?></p>
                        </div>
            
                    <?php endwhile;?>
                
                </div><!--r-->
            
            <?php endif;?>
            
            </div><!--camp activities-->
			
			<h3 class="heading"><?php echo $title; ?></h3>
				
			<p><?php echo wp_strip_all_tags(substr($content, 0, 250) . "...", true); ?></p>
		
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
