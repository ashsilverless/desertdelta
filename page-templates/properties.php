<?php
/**
 * ============== Template Name: Properties Page
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
	
	<div class="container">
		
		<div class="row">
            
            <div class="col-6 offset-3 pt5 text-center mb5">
	                
                <?php get_template_part('template-parts/text-block');?>
                
            </div><!--col-->

        </div>
		
	</div><!--c-->
	
	<?php get_template_part('template-parts/map', 'camps');?>
    
    <?php get_template_part('template-parts/cta', 'itinerary');?>

</div><!--content-->
 
<?php get_footer(); ?>
