<?php
/**
 * The template for displaying all single posts
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
		
		<div class="content mt2">
		
			<div class="itinerary-description closed">
				
		        <?php echo get_field("description"); ?>
		        
		    </div>
		    
		    <div class="read-more">Read More</div>
		    
		    <table class="table-itinerary mt3">
		    
		    <?php

			if( have_rows('days') ):
		
				while ( have_rows('days') ) : the_row(); ?>
				
				<tr>
					<th>
						<div class="heading heading__secondary-color font600"><?php the_sub_field('name'); ?>
							<div class="circle"></div>
						</div>
					</th>
					
					<td class="pb2">
				
						<div class="item-itinerary">
							
							<h3 class="heading"><?php the_sub_field('title'); ?></h3>
							
							<div class="collapsible">
							
								<img style="background:url(<?php the_sub_field('image'); ?>)"/>
								
								<div class="text">
								
									<div><?php the_sub_field('description'); ?></div>
								
									<?php
									
									if(get_sub_field('related_camp')): $camp = get_sub_field('related_camp'); ?>
									
										<a class="button" href="<?php echo get_permalink($camp->ID); ?>">
											<i class="fas fa-campground"></i>
											<span>Find out more about <span><?php echo $camp->post_title; ?></span></span>
										</a>
										
										<?php
											
										$destination = get_the_terms($camp->ID, 'destination');
										
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
	
	</div><!--c-->
	
	<?php get_template_part('template-parts/map', 'camps');?>
	
	<?php get_template_part('template-parts/other-itineraries');?>

</div>

<?php endwhile;
	
get_footer();
