<div class="carousel-wrapper pt5 pb5">
	
	<div class="owl-carousel latest-news-slider">
	
	<?php
		
	$recent_posts = wp_get_recent_posts( array( 'numberposts' => '5' ) );
	
	foreach( $recent_posts as $recent ): $id = $recent["ID"]; ?>
	
	
		<div class="latest-news-slider__item">
			
			<div class="latest-news-header">
				
				<h3 class="heading"><?php echo $recent["post_title"]; ?></h3>
				
				<span><?php echo get_the_date( 'j F Y', $id ); ?></span>
				
				<?php 
					set_query_var('id', $id);
					get_template_part('template-parts/share-buttons');
				?>
				
			</div>
			
			<img src="<?php echo get_field( "image", $id ); ?>"/>
			
			<div>
				<div><?php echo apply_filters( 'the_content', substr($recent["post_content"], 0, 400) . "..." ); ?></div>
				
				<a href="<?php echo get_permalink( $id ); ?>">Read More</a>
			</div>
			
		</div>
	
	<?php endforeach; wp_reset_query(); ?>
	
	</div>

</div>