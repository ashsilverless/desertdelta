<div class="carousel-wrapper mt5 mb5">
	
	<div class="owl-carousel latest-news-slider">
	
	<?php
		
	$recent_posts = wp_get_recent_posts( array( 'numberposts' => '5' ) );
	
	foreach( $recent_posts as $recent ): $id = $recent["ID"]; ?>
	
	
		<div class="latest-news-slider__item">
			
			<h3><?php echo $recent["post_title"]; ?></h3>
			
			<p><?php echo get_the_date( 'j F Y', $id ); ?></p>
			
			<img src="<?php echo get_field( "image", $id ); ?>"/>
			
			<div><?php echo apply_filters( 'the_content', substr($recent["post_content"], 0, 400) . "..." ); ?></div>
			
			<a href="<?php echo get_permalink( $id ); ?>">Read More</a>
			
		</div>
	
	<?php endforeach; wp_reset_query(); ?>
	
	</div>

</div>