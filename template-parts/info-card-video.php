<div class="info-card slide-up">
	
	<?php
		
	$id      = $post->ID;
	$title   = $post->post_title;
	$image   = get_field('hero_background_image', $id)["url"];
	$content = $post->post_content ? $post->post_content : get_field("description", $post->ID);
	$link    = get_permalink( $id );
	
	?>
		
	<img src="<?php echo $image; ?>"/>
	
	<div>
		
		<div class="info-card__text mt2 ml3 mr3">
			
			<h3 class="heading"><?php echo $title; ?></h3>
				
			<p><?php echo wp_strip_all_tags(substr($content, 0, 140) . "...", true); ?></p>
		
		</div>
			
		<a class="info-read-more" href="<?php echo $link; ?>">Read More</a>
		
	</div>
		
</div>
