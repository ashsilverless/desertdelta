<?php
/**
 * ============== Template Name: Contact Page
 *
 * @package desertdelta
 */

get_header();?>

<!-- ******************* Hero Content ******************* -->

<div class="content has-hero">

<?php if( get_field('hero_background_image') ): 

    get_template_part('template-parts/hero');?>

<?php endif;?>

<!-- ******************* Hero Content END ******************* -->

<!-- ******************* Hero Content ******************* -->

    <div class="container contact mt5 mb5">
	    
	    <div class="main-content">
	    
		    <div class="info">
			    
				<div>
					<label>Reservations</label>
					<span><?php the_field("email_address_reservations", "options"); ?></span>
					<span><?php the_field("telephone_number_reservations", "options"); ?></span>
				</div>
			
				<div>
					<label>Marketing</label>
					<span><?php the_field("email_address_marketing", "options"); ?></span>
					<span><?php the_field("telephone_number_marketing", "options"); ?></span>
				</div>
				
				
				<div>
					<label>Postal Address</label>
					<div class="text"><?php the_field("postal_address", "options"); ?></div>
				</div>
				
				<div>
					<label>Physical Address</label>
					<div class="text"><?php the_field("physical_address", "options"); ?></div>
				</div>
				
				<div>
					<label>Representation</label>
					<?php
						
					$rows = get_field("representation", "options");
					
					if(sizeof($rows)):
					
					foreach($rows as $row): ?>
					
					<div class="text collapsible mb1">
						<span><?php echo "+ " . $row["name"]; ?></span>
						<div><?php echo $row["description"]; ?></div>
					</div>
						
					<?php endforeach; endif; ?>
				</div>
				
		    </div>
		    
		    <div class="form">
		        
		        <div>
		            <?php echo do_shortcode('[contact-form-7 id="2068" title="Contact Form"]');?>
		        </div>
		    
		    </div>
		    
	    </div>
      
    </div><!--c-->
    
    <hr>
    
    <?php get_template_part('template-parts/cta', 'itinerary');?>
    
    <?php get_template_part('template-parts/our-latest-news');?>

    <?php get_template_part('template-parts/cta', 'cares');?>
    
    <hr>
 
    <?php get_template_part('template-parts/cta', 'newsletter');?> 

</div><!--content-->
 
<?php get_footer(); ?>
