<?php
/**
 * The template for displaying all single camps
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
	    
	</div><!--hero-->
	
	
<!-- ******************* Hero Content END ******************* -->
	 
	<div class="container-custom">
	
	    <div class="container">
	    
	    	<div class="custom-header">
		        <h1 class="heading heading__lg font700 custom-title"><?php the_title(); ?></h1>
		        
		        <?php 
			        
		        $destination = get_the_terms($post->ID, 'destinations')[0];
		        if($destination):
		        
		        ?>
			        
		        <div class="custom-location"><a href="<?php echo get_term_link($destination->term_id); ?>"><i class="fas fa-map-marker-alt"></i> <?php echo $destination->name; ?></a></div>
		        
		        <?php endif;?>
		        
		        <div class="custom-description">
			        <?php echo get_field("description"); ?>
		        </div>
		        
		        <a class="read-more anchor" href="#footer-text">Read More</a>
		        
		        <div class="custom-actions extended">
			        <div><button name="gallery" class="active"><i class="fas fa-camera"></i>Gallery</button></div>
			        <div><button name="video"><i class="fas fa-video"></i>Video</button></div>
			        <div><button name="data"><i class="fas fa-cogs"></i>Data</button></div>
			        <div><button name="layout"><i class="fas fa-map"></i>Layout</button></div>
		        </div>
		    </div>
	        
	    </div>
	    
	    <div class="custom-info">

		    <div class="gallery">
			    
			    <?php 
	
				$images = get_field('gallery');
				
				if( $images ): ?>
			        <?php foreach( $images as $image ): $url = $image['url']; ?>
			        
	                <a href="<?php echo $image['url']; ?>" style='background-image: url(<?php echo $url; ?>)'></a>
	                
			        <?php endforeach; ?>
				<?php endif; ?>
				
		    </div>
		    
		    <div class="video hidden">
			    <?php $video = get_field('video');?>
<div class="embed-responsive embed-responsive-16by9">
<iframe class="embed-responsive-item" src="https://player.vimeo.com/video/<?php echo $video; ?>" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
</div>		    
		    </div>
		    
		    <div class="data hidden">
			    
			    <div class="container">
				    
				    <?php if( have_rows('data') ): while ( have_rows('data') ) : the_row(); ?>
					
					<div class="row-data pb5">
	
						<h3 class="heading heading__alt-font font700"><?php the_sub_field('info_title'); ?></h3>
						
						<table>
							<colgroup width="25%">
							
							<?php if( have_rows('more_info') ): while ( have_rows('more_info') ) : the_row(); ?>
							
								<tr>
									<th><?php the_sub_field('info_name'); ?></th>
									<td><?php the_sub_field('info_description'); ?></td>
								</tr>
							
							<?php endwhile; endif; ?>
							
						</table>
						
					</div>
					
					<?php endwhile; endif; ?>
				    
			    </div>
			    
		    </div>
		    
		    <div class="layout hidden">
			    <div class="camp-plan">
					<img src="<?php echo get_field('plan_image')["url"]; ?>"/>
				</div>
		    </div>
		
	    </div>
	    
	    <div class="container" id="footer-text">
		    
		    <div class="custom-footer-text mt4"><div><?php the_field('footer_text'); ?></div></div>
		    
	    </div>
	
	</div><!--c-->
	
	<?php get_template_part('template-parts/map', 'camps');?>
	
	<?php get_template_part('template-parts/other-camps');?>
	
	<?php get_template_part('template-parts/cta', 'itinerary');?>

</div>

<?php endwhile;
	
get_footer();
