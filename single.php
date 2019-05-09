<?php
/**
 * The template for displaying all single posts
 *
 * @package desertdelta
 */

get_header();
?>

<?php
    while ( have_posts() ) :
	the_post();?>

<!-- ******************* Hero Content ******************* -->

<?php $heroImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>

<div class="hero h75" style="background-image: url(<?php echo $heroImage[0]; ?>);">

    <a href="<?php echo home_url(); ?>" alt="<?php wp_title(''); ?>" title="<?php wp_title(''); ?>" class="hero__brand slide-down">
        <?php get_template_part('template-parts/logo');?>
    </a>
        
    <div class="hero__content">       

        <h2 class="heading heading__xl heading__light center slide-up mr1 ml1"><?php the_title(); ?></h2>
        
        <h1 class="heading heading__md heading__light center heading__alt-font slow-fade brand-dot"><?php the_date();?></h1>
   
    </div>       
    
</div><!--hero-->


<!-- ******************* Hero Content END ******************* -->
 
<div class="container">
	
	<?php get_template_part('template-parts/breadcrumb'); ?>

    <div class="row">
    
        <article class="article-news mt3 mb5 mr3 ml3">
			
			<div class="news-container">
				
				<?php the_content();
	
				endwhile; // End of the loop.
				?>
				
			</div>
	        
	        <div class="adjacent-posts mt5">
		        
		        <?php
			        $prev_post = get_previous_post();
			        $next_post = get_next_post();
			    ?>
		        
		        <?php if( $prev_post ): ?>
		        
		        <a href="<?php echo get_permalink($prev_post->ID); ?>" class="previous-post">
		        
			        <i class="fas fa-chevron-left"></i>
			        
			        <span><?php echo $prev_post->post_title; ?></span>
			        
			    </a>
			    
			    <?php endif; if( $next_post ): ?>
			
				<a href="<?php echo get_permalink($next_post->ID); ?>" class="next-post">
			        
			        <span><?php echo $next_post->post_title; ?></span>
					
			        <i class="fas fa-chevron-right"></i>
			        
			    </a>
				
				<?php endif; ?>
			
	        </div>

	    </article>
        
    </div>

</div><!--c-->

<?php get_footer();
