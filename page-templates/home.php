<?php
/**
 * ============== Template Name: Home
 *
 * @package desertdelta
 */
get_header();?>

<!-- ******************* Hero Content ******************* -->

<div class="content has-hero">

<?php if( get_field('hero_background_image') ): 

    get_template_part('template-parts/hero');
    get_template_part('template-parts/sub', 'hero');
    ?>

<?php endif;?>

    <div class="container">
    
        <div class="row">
            
            <div class="col-8 offset-2 pt5 text-center">

                <div class="mb5">
                    <?php get_template_part('template-parts/text-block');?>
                </div>
                
            </div><!--col-->

        </div>
      
    </div><!--c-->

    <?php get_template_part('template-parts/map', 'camps');?>
    
    <?php get_template_part('template-parts/our-latest-news');?>
 
    <?php get_template_part('template-parts/cta', 'newsletter');?> 

    <?php get_template_part('template-parts/cta', 'cares');?>
    
    <?php get_template_part('template-parts/cta', 'itinerary');?>
    
    <?php get_template_part('template-parts/cta', 'contact');?> 
    
</div><!--content-->
 
<?php get_footer(); ?>