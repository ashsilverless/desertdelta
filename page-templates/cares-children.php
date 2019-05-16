<?php
/**
 * ============== Template Name: Cares Children Page
 *
 * @package desertdelta
 */
 
get_header();

while ( have_posts() ) :
the_post(); ?>

<!-- ******************* Hero Content ******************* -->

<div class="content has-hero">

<?php if( get_field('hero_background_image') ): 

    get_template_part('template-parts/hero');?>

<?php endif;?>

<!-- ******************* Hero Content END ******************* -->
	
	<div class="container pb5">
		
	    <?php get_template_part('template-parts/breadcrumb'); ?>
	    
	    <div class="content pt2 pb1 dark-dot">
	    	<?php the_content(); ?>
	    </div>
    
	</div>
	
	<?php get_template_part('template-parts/map', 'camps');?>
	
    <?php get_template_part('template-parts/cta', 'itinerary');?>
    
    <?php get_template_part('template-parts/cta', 'newsletter');?>

</div><!--content-->

<?php endwhile; ?>
 
<?php get_footer(); ?>
