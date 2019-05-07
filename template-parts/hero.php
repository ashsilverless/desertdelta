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
    
        <div class="row">
                
            <div class="hero__content">       

        				    <?php $brandImage = get_field('logo', 'options');?>	
        				
    						<a href="<?php echo home_url(); ?>" alt="<?php wp_title(''); ?>" title="<?php wp_title(''); ?>" class="logo">
        						
        						<?php get_template_part('template-parts/logo');?>
        						
    						</a>

                <h1 class="heading heading__xl heading__light center slow-fade"><?php the_field( 'hero_heading' );?></h1>

                <?php if ( is_front_page() ) {?>
                
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form mt3 mb3">
		<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Job Title / Job Keywords', 'desertdelta' ); ?>" />
		<input type="hidden" name="post_type" value="job" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search Jobs', 'desertdelta' ); ?>" />
	</form>

                <?php }?>
           
            </div>       
                
        </div>
    
    </div>
    
</div><!--hero-->

<?php endif;?>

