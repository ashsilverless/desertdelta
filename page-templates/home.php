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

    get_template_part('template-parts/hero');?>

<?php endif;?>

    <div class="container">
    
        <div class="row">
            
            <div class="col-6 pt3">

                <div class="mb5">
                    <?php get_template_part('template-parts/text-block');?>
                </div>
                
                <?php 
                    if( have_rows('leader') ): 
                    while ( have_rows('leader') ) : the_row(); ?>
                    
                <?php $leaderImage = get_sub_field('image');?>
                
                <div class="leader mb5 slide-up" style="background-image: url(<?php echo $leaderImage['url']; ?>); border-color: <?php the_sub_field('border_color');?>">
                    
                    <h3 class="heading heading__md font700"><?php the_sub_field('heading');?></h3>
                    
                    <div class="buttons">
                        
                        <a href="<?php the_sub_field('button_one_target');?>" class="button button__fullwidth mb1" style="background-color: <?php the_sub_field('button_color');?>"><?php the_sub_field('button_one_text');?></a>
                        
                        <a href="<?php the_sub_field('button_two_target');?>" class="button button__fullwidth" style="background-color: <?php the_sub_field('button_color');?>"><?php the_sub_field('button_two_text');?></a>
                        
                    </div>

                </div>

                <?php endwhile; endif;?>                

				<?php get_template_part('template-parts/testimonial');?>
                
            </div><!--col-->
            
            <div class="col-5 offset-1">

                <?php get_template_part('template-parts/sidebar');?>
                
            </div><!--col-->            

        </div>
      
    </div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>