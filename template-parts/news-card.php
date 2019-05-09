<div class="news-card">
	
	<img src="<?php echo get_field( "image", $post->ID ); ?>"/>
	
	<span><?php echo get_the_date( 'j F Y', $post->ID ); ?></span>
	
	<h3 class="heading"><?php echo $post->post_title; ?></h3>
		
	<div><?php echo apply_filters( 'the_content', substr($post->post_content, 0, 200) . "..." ); ?></div>
		
	<a href="<?php echo get_permalink( $post->ID ); ?>">Read More</a>
		
</div>
