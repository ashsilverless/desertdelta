<?php $heroImage = get_field('hero_background_image');?>

    <div class="hero <?php the_field( 'hero_height' );?>" style="background-image: url(<?php echo $heroImage['url']; ?>); background-color: <?php echo $heroColor; ?>;">

    <div class="container">
    
        <div class="row">

            <a href="<?php echo home_url(); ?>" alt="<?php wp_title(''); ?>" title="<?php wp_title(''); ?>" class="hero__brand">
                <?php get_template_part('template-parts/logo');?>
            </a>
                
            <div class="hero__content">       

                <h1 class="heading heading__xl heading__light center slide-up"><?php the_field( 'hero_heading' );?></h1>
           
            </div>       
                
        </div>
    
    </div>
    
</div><!--hero-->
