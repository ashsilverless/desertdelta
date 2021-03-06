<div aria-label="breadcrumb">
	
	<ol class="breadcrumb">
		
		<?php if(is_singular("post")): $post = get_page_by_path( get_page_uri(), OBJECT, "post" ); ?>
			
			<!-- News -->
		
			<li class="breadcrumb-item"><a href="/news">News</a></li>
			
			<li class="breadcrumb-item"><a href="<?php echo get_permalink($post); ?>"><?php echo get_the_title($post); ?></a></li>
			
		<?php elseif(is_singular("camps")): $post = get_page_by_path( get_page_uri(), OBJECT, "camps" ); ?>
		
			<!-- Camps -->
			
			<li class="breadcrumb-item"><a href="<?php echo get_permalink($post); ?>"><?php echo get_the_title($post); ?></a></li>
		
		<?php elseif(is_singular("itineraries")): $post = get_page_by_path( get_page_uri(), OBJECT, "itineraries" ); ?>
		
			<!-- Itineraries -->
			
			<li class="breadcrumb-item"><a href="/itineraries">Itineraries</a></li>
			
			<li class="breadcrumb-item"><a href="<?php echo get_permalink($post); ?>"><?php echo get_the_title($post); ?></a></li>
		
		<?php elseif(is_singular("information")): $post = get_page_by_path( get_page_uri(), OBJECT, "information" ); ?>
		
			<!-- Information -->
			
			<li class="breadcrumb-item"><a href="/information">Information</a></li>
			
			<li class="breadcrumb-item"><a href="<?php echo get_permalink($post); ?>"><?php echo get_the_title($post); ?></a></li>
		
		<?php elseif(is_page()): ?>
		
		<!-- News -->
		
		<?php $page_names = explode("/", get_page_uri());
		
		foreach( $page_names as $page_name ):
			
			$page = get_page_by_path( $page_name, OBJECT, "page" ); ?>
				
			<li class="breadcrumb-item"><a href="<?php echo get_permalink($page); ?>"><?php echo get_the_title($page); ?></a></li>
		
		<?php endforeach; endif; ?>
		
	</ol>
	
</div>