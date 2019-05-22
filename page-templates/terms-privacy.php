<?php
/**
 * ============== Template Name: Terms and Privacy
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
	
	<div class="container large justify pt5">
		
		<?php the_content(); ?>
		
	</div><!--c-->
	
	<?php get_template_part('template-parts/map', 'camps');?>
  
    <?php get_template_part('template-parts/our-latest-news');?>

    <?php get_template_part('template-parts/cta', 'cares');?>
    
    <?php get_template_part('template-parts/cta', 'itinerary');?>
    
    <?php get_template_part('template-parts/cta', 'newsletter');?>

</div><!--content-->

<?php endwhile;
	
get_footer();
