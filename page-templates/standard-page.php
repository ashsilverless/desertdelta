<?php
/**
 * ============== Template Name: Standard Page
 *
 * @package desertdelta
 */
get_header();?>

<!-- ******************* Hero Content ******************* -->

<div class="content has-hero">

<?php if( get_field('hero_background_image') ): 

    get_template_part('template-parts/hero');?>

<?php endif;?>

    <div class="container">
    
        <div class="row">
            
            <div class="col-6 pt3">
                
                <?php if( get_field('text_block_text') ): ?>

                <div class="mb5">
                    <?php get_template_part('template-parts/text-block');?>
                </div>

                <?php endif;?>
                
                <div class="mb5">
                    <?php the_field('body_content');?>
                </div>                               

                <?php get_template_part('template-parts/testimonial');?>
                
            </div><!--col-->
            
            <div class="col-5 offset-1 sticky-sidebar">
                
                <?php get_template_part('template-parts/sub', 'menu');?>

                <div class="sidebar-wrapper">
                    
                    <?php get_template_part('template-parts/sidebar');?>
                
                </div>
                
            </div><!--col-->            

        </div>
      
    </div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>