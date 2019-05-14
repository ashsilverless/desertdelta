<div class="info-card slide-up">
	
	<?php 
	
	$content = $post->post_content ? $post->post_content : get_field("description", $post->ID); ?>
		
	<img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' )[0]; ?>"/>
			
	<div>
		
	<div class="info-card__text mt2 ml3 mr3">
		
		<?php if($date): ?>
		
		<span class="mb1"><?php echo get_the_date( 'j F Y', $post->ID ); ?></span>
		
		<?php endif; ?>
		
		<h3 class="heading"><?php echo $post->post_title; ?></h3>
			
		<p><?php echo wp_strip_all_tags(substr($content, 0, 150) . "...", true); ?></p>
	
	</div>
		
	<a href="<?php echo get_permalink( $post->ID ); ?>">Read More</a>
	
	</div>
		
</div>
