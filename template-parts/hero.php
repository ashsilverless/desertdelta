<?php 
    if( get_field('hero_type') == 'image' ): 
        $heroImage = get_field('hero_background_image');
    elseif ( get_field('hero_type') == 'color' ): 
        $heroColor = get_field('hero_background_colour');
    endif;
?>

<?php 
    if( get_field('hero_type') !== 'slider'):
?>

    <div class="hero <?php the_field( 'hero_height' );?>" style="background-image: url(<?php echo $heroImage['url']; ?>); background-color: <?php echo $heroColor; ?>;">

    <div class="container">
                
        <div class="hero__content">       

		    <?php $brandImage = get_field('logo', 'options');?>	
		
			<a href="<?php echo home_url(); ?>" alt="<?php wp_title(''); ?>" title="<?php wp_title(''); ?>" class="logo">
				
				<?php get_template_part('template-parts/logo');?>
				
			</a>

			<div class="hero__text">
	            <h1 class="heading heading__xl heading__light center slow-fade"><?php the_field( 'hero_heading' );?></h1>
				<h2 class="heading heading__lg heading__light center slow-fade"><?php the_field( 'hero_sub_heading' );?></h2>
			</div>
			
        </div>
    
    </div>
    
</div><!--hero-->

<?php endif;?>

