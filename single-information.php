<?php
/**
 * The template for displaying all single informations
 *
 * @package desertdelta
 */

get_header();

while ( have_posts() ) :
the_post(); ?>

<!-- ******************* Hero Content ******************* -->

<div class="content has-hero">

	<?php $heroImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
	
	<div class="hero h75" style="background-image: url(<?php echo $heroImage[0]; ?>);">
	
	    <a href="<?php echo home_url(); ?>" alt="<?php wp_title(''); ?>" title="<?php wp_title(''); ?>" class="hero__brand slide-down">
	        <?php get_template_part('template-parts/logo');?>
	    </a>
	    
	    <div class="hero__content">       

            <h2 class="heading heading__xl heading__light center slide-up"><?php echo the_title();?></h2>
       
        </div>
	    
	</div><!--hero-->
	
	
<!-- ******************* Hero Content END ******************* -->
	 
	<div class="information">
		
		<div class="container pb5">
		
		    <?php get_template_part('template-parts/breadcrumb'); ?>
		    
		    <div class="content pt2 pb1 dark-dot">
		    	<?php the_content(); ?>
		    </div>
	    
		</div>
	
	</div><!--c-->
	
	<div class="container pt2">
		<?php
	
		$args = array(
			'numberposts' => -1,
			'post_type'   => 'information'
		);
		$posts = get_posts( $args ); ?>
		
		<div class="wrapper-cards large mt2">
			
		<?php foreach($posts as $post): ?>
		
			<div class="wrapper-card">
				
			<?php
	
			set_query_var('post', $post);
			set_query_var('date', false);
			get_template_part('template-parts/info-card');
			
			?>
			
			</div>
		
		<?php endforeach; ?>
		
		</div>
	</div>
	
	<?php get_template_part('template-parts/map', 'camps');?>
	
	<?php get_template_part('template-parts/cta', 'itinerary');?>

</div>

<?php endwhile;
	
get_footer();
