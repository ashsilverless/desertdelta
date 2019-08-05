<?php
/**
 * ============== Template Name: Destinations Page
 *
 * @package desertdelta
 */
 
get_header();?>

<!-- ******************* Hero Content ******************* -->

<div class="content has-hero">

<?php if( get_field('hero_background_image') ): 

    get_template_part('template-parts/hero');
    get_template_part('template-parts/sub', 'hero');?>

<?php endif;?>

<!-- ******************* Hero Content END ******************* -->
	
	<div class="container large">
		
		<div class="row">
            
            <div class="col-8 offset-2 mt5 text-center mb5">
	                
                <?php get_template_part('template-parts/text-block');?>
                
            </div><!--col-->

        </div>
        
        <div class="wrapper-destinations">
	        
	        <div class="menu">
		        
		        <button name="all" class="active">All</button>
		        
		        <?php
			        
				$terms = get_terms( 'destinations', array(
					'hide_empty' => false,
				));
				
				foreach($terms as $term): ?>
				
					<button name="<?php echo $term->slug; ?>"><?php echo $term->name; ?></button>
				
			    <?php endforeach; ?>
		        
	        </div>
	        
	        <div class="wrapper-cards-horizontal">
				
			<?php foreach($terms as $term): ?>
			
				<div class="wrapper-card mb2 <?php echo $term->slug; ?>">
					
				<?php
				
				set_query_var('image_as_background', true);
				set_query_var('destinations_taxonomy', $term);
				set_query_var('date', false);
				get_template_part('template-parts/info-card');
				
				?>
				
				</div>
			
			<?php endforeach; ?>
		        
	        </div>
	        
        </div>
		
	</div><!--c-->
	
	<?php get_template_part('template-parts/map', 'camps');?>
    
    <?php get_template_part('template-parts/cta', 'itinerary');?>

</div><!--content-->
 
<?php get_footer(); ?>
