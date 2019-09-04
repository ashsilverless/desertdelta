<?php
/**
 * The template for displaying all single posts
 *
 * @package desertdelta
 */

get_header();
$term = get_queried_object();

?>

<!-- ******************* Hero Content ******************* -->

<div class="content has-hero">

	<?php $heroImage = get_field("image", $term)["url"]; ?>
	
	<div class="hero h75" style="background-image: url(<?php echo $heroImage; ?>);">
		
		<?php
		
		$video = get_field("background_video", $term);
		
		if($video): 
		
			$video = "https://player.vimeo.com/video/" . $video; ?>
			
			<div class="wrapper-video">
				
				<iframe src="<?php echo $video; ?>?background=1&autoplay=1&loop=1&byline=0&title=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				
			</div>
				
		<?php endif; ?>
	
	    <a href="<?php echo home_url(); ?>" alt="<?php wp_title(''); ?>" title="<?php wp_title(''); ?>" class="hero__brand slide-down">
	        <?php get_template_part('template-parts/logo');?>
	    </a>
	    
	</div><!--hero-->
	
	
<!-- ******************* Hero Content END ******************* -->
	 
	<div class="container-custom">
	
	    <div class="container">
	    
	    	<div class="custom-header">
		    	
		        <h1 class="heading heading__lg font700 custom-title"><?php echo $term->name; ?></h1>
			        
		        <div class="custom-location">Botswana</div>
		        
		        <div class="custom-description closed">
			        <?php echo get_field("description", $term); ?>
		        </div>
		        
		        <a class="read-more anchor" href="#footer-text">Read More</a>
		        
		        <div class="custom-actions">
			        <div><button name="gallery" class="active"><i class="fas fa-camera"></i>Gallery</button></div>
			        <div><button name="lodges"><i class="fas fa-campground"></i>Lodges</button></div>
			        <div class="long-text"><button name="data"><i class="fas fa-cogs"></i>Quick facts</button></div>
			        <div class="short-text"><button name="data"><i class="fas fa-cogs"></i>Facts</button></div>
		        </div>
		    </div>
	        
	    </div>
	    
	    <div class="custom-info">
		    
		    <div class="lodges container hidden">
			    
			    <?php
	
				$args = array(
					'numberposts' => -1,
					'post_type'   => 'camps',
					'tax_query' => array(
						array(
							'taxonomy' => 'destinations',
							'field'    => 'slug',
							'terms'    => $term->slug
						)
					)
				);
				$posts = get_posts( $args ); ?>
				
				<div class="wrapper-cards">
					
				<?php foreach($posts as $post): ?>
				
					<div class="wrapper-card light">
						
					<?php
			
					set_query_var('post', $post);
					set_query_var('date', false);
					get_template_part('template-parts/info-card');
					
					?>
					
					</div>
				
				<?php endforeach; ?>
				
				</div>
			    
		    </div>
		    
		    <div class="gallery">
			    
			    <?php 
	
				$images = get_field('gallery', $term);
				
				if( $images ): ?>
			        <?php foreach( $images as $image ): $url = $image['url']; ?>
			        
	                <a href="<?php echo $image['url']; ?>" style='background-image: url(<?php echo $url; ?>)'></a>
	                
			        <?php endforeach; ?>
				<?php endif; ?>
				
		    </div>
		    
		    <div class="data hidden">
			    
			    <div class="container">
				    <?php 
					    
				    $quick_facts = get_field('quick_facts', $term);
					
					if( sizeof($quick_facts) > 0 ): ?>
				    
				    <ul class="custom-list mt3 pb5">
					    
					    <?php foreach($quick_facts as $fact): ?>
					    
						<li><i class="fas fa-check"></i><?php echo $fact["fact"]; ?></li>
						
						<?php endforeach; ?>
					
					</ul>
					
					<?php endif; ?>
				    
			    </div>
			    
		    </div>
		
	    </div>
	    
	    <div class="container" id="footer-text">
		    
		    <div class="custom-footer-text mt4"><div><?php the_field('footer_text', $term); ?></div></div>
		    
	    </div>
	
	</div><!--c-->
	
	<?php get_template_part('template-parts/map', 'camps');?>
	
	<?php get_template_part('template-parts/cta', 'itinerary');?>

</div>

<?php
	
get_footer();
