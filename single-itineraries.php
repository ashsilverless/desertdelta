<?php
/**
 * The template for displaying all single itineraries
 *
 * @package desertdelta
 */

get_header();

while ( have_posts() ) :
the_post(); ?>

<!-- ******************* Hero Content ******************* -->

<div class="content has-hero">

	<?php $heroImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
	
	<div class="hero h75" style="background-image: url(<?php echo $heroImage[0]; ?>);">
	
	    <a href="<?php echo home_url(); ?>" alt="<?php wp_title(''); ?>" title="<?php wp_title(''); ?>" class="hero__brand slide-down">
	        <?php get_template_part('template-parts/logo');?>
	    </a>
	    
	    <?php
		    
		$camps = array();

		if( have_rows('days') ):
		
			while ( have_rows('days') ) : the_row();
			
				array_push($camps, get_sub_field("related_camp")->post_title);
			
			endwhile;
		
		endif;
		
		$camps = array_filter(array_unique($camps));
		
		?>
	    
	    <div class="itineraries-hero hero__content">       

            <h2 class="heading heading__xl heading__light center slide-up"><?php the_title(); ?></h2>

            <h1 class="heading heading__md heading__light center heading__alt-font slow-fade brand-dot font	400"><?php echo implode(" | ", $camps); ?></h1>
       
        </div>
	    
	</div><!--hero-->
	
	
<!-- ******************* Hero Content END ******************* -->
	 
	<div class="container center itinerary">
		
		<?php get_template_part('template-parts/breadcrumb'); ?>
		
		<h2 class="heading heading__md heading__secondary-color center mt2"><?php the_field("duration"); ?></h2>
		
		<div class="wrapper-timeline">
			
			<div class="content-timeline mt2">
			
				<div class="itinerary-description closed">
					
			        <?php echo get_field("description"); ?>
			        
			    </div>
			    
			    <div class="read-more expand">Read More</div>
			    
			    <table class="table-timeline content-itinerary mt3">
			    
			    <?php
				    
				$map_camps = array();
	
				if( have_rows('days') ):
			
					while ( have_rows('days') ) : the_row(); ?>
					
					<tr>
						<th>
							<div class="heading heading__secondary-color font600 day-info">
								<span><?php the_sub_field('name'); ?></span>
								<div class="circle aligned-top"></div>
							</div>
						</th>
						
						<td class="pb2">
					
							<div class="item-timeline">
								
								<h3 class="heading"><?php the_sub_field('title'); ?></h3>
								
								<div class="collapsible">
									
									<?php $gallery = get_sub_field("gallery");
									
									if($gallery && sizeof($gallery) > 0): ?>
										
									<div class="itinerary-gallery-wrapper">
										
										<div class="owl-carousel itinerary-gallery-slider">
									
											<?php foreach($gallery as $image): ?>
												
												<div class="itinerary-gallery-slider__item img" style="background:url(<?php echo $image["url"]; ?>);"></div>
											
											<?php endforeach; ?>
										
										</div>
										
									</div>
									
									<?php endif; ?>
									
									<div class="text">
									
										<div><?php the_sub_field('description'); ?></div>
									
										<?php
										
										if(get_sub_field('related_camp')): $camp = get_sub_field('related_camp'); ?>
										
										<?php array_push($map_camps, "#" . $camp->post_name); ?>
										
											<a class="button" href="<?php echo get_permalink($camp->ID); ?>">
												<i class="fas fa-campground"></i>
												<span>Find out more about <span><?php echo $camp->post_title; ?></span></span>
											</a>
											
											<?php
												
											$destination = get_the_terms($camp->ID, 'destinations');
											
											if($destination): ?>
											
											<a class="button" href="<?php echo get_term_link($destination[0]->term_id); ?>">
												<i class="fas fa-globe-africa"></i>
												<span>Find out more about <span><?php echo $destination[0]->name; ?></span></span>
											</a>
											
											<?php endif;
												
										endif; ?>
									</div>
								</div>
								
							</div>
						</td>
					
					</tr>
						
					<?php endwhile;
					
				endif;
				    
				?>
				
			    </table>
			    
			</div>
		
		</div>
	
	</div><!--c-->
	
	<?php
	
	$start_location = get_field("itinerary_start");
	$end_location   = get_field("itinerary_end");
	
	$visible_camps = array(
		"camps" => $map_camps,
		"start" => $start_location,
		"end"	=> $end_location
	);
	
	?>
	
	<div class="visible-camps" <?php printf('visible-camps="%s"', htmlspecialchars(json_encode($visible_camps), ENT_QUOTES, 'UTF-8')); ?>></div>
	
	<?php get_template_part('template-parts/map', 'camps');?>
	
	<?php get_template_part('template-parts/other-itineraries');?>

</div>

<?php endwhile;
	
get_footer();
