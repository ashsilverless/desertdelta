<div class="other-itineraries">
	
	<div class="container">
		
		<h2 class="heading heading__md center dark-dot slide-down mb2">Other Itineraries</h2>
		
		
		<?php
	
		$args = array(
			'numberposts' => 3,
			'post_type'   => 'itineraries',
			'post__not_in' => array(get_the_ID())
		);
		$posts = get_posts( $args ); ?>
		
		<div class="wrapper-cards">
			
		<?php foreach($posts as $post): ?>
		
			<div class="wrapper-card">
				
			<?php
	
			set_query_var('post', $post);
			set_query_var('date', false);
			get_template_part('template-parts/info-card');
			
			?>
			
			</div>
		
		<?php endforeach; ?>
		
		</div>
	
	</div>
	
</div>