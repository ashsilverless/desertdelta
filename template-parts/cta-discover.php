<?php if (have_rows('cta_discover', 'options')):
    while (have_rows('cta_discover', 'options')) : the_row(); ?>

    <div class="cta discover" style="background-image: url(<?php echo get_sub_field('image')["url"]; ?>);">
	    
	    <a href="/itineraries" class="main-destination center brand-dot">
		    
		    <?php include(get_template_directory() . '/inc/img/itinerary-icon.svg'); ?>
		    
		    <div class="text_discover heading__lg font100">Discover</div>
		    <div class="text_itineraries heading heading__lg">Itineraries</div>
		    <div class="text_destination heading__md mb1">in <?php echo get_queried_object()->name; ?></div>
		    
	    </a>
	                    
        <div class="content">
            
            <p><?php the_sub_field('copy');?>
                <span class="brand-dot">
                    <?php the_field('email_address_reservations', 'options');?><br/>
                    <?php the_field('telephone_number_reservations', 'options');?>
                </span>
            </p>
        
        
	        <div class="socials">
	
	            <?php if( have_rows('social_links', 'option') ): while( have_rows('social_links', 'option') ): the_row(); ?>
	
	            <a href="<?php the_sub_field('page_link'); ?>"><i class="fab fa-<?php the_sub_field('name'); ?>"></i></a>
	
	            <?php endwhile; endif; ?>
	
	        </div>        
        
            
        </div>
     
    </div>

<?php endwhile; endif;?>