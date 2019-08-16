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

            <h2 class="heading heading__xl heading__light center slide-up"><?php the_field("visible_heading");?></h2>
       
        </div>
	    
	</div><!--hero-->
	
	
<!-- ******************* Hero Content END ******************* -->
	 
	<div class="information">
		
		<div class="container pb5">
		
		    <?php get_template_part('template-parts/breadcrumb'); 
				
			if( have_rows('flexible_content') ):
			
			while ( have_rows('flexible_content') ): the_row();
			
			switch ( get_row_layout() ) :
			
				case 'text_block':
					get_template_part('template-parts/flexible-text-block');
				break;
				
				case 'toggle_block':
					get_template_part('template-parts/flexible-toggle-block');
				break;
				
				case 'data_block':
					get_template_part('template-parts/flexible-data-block');
				break;
				
				case 'month_block':
					get_template_part('template-parts/flexible-month-block');
				break;
				
				case 'gallery_block':
					get_template_part('template-parts/flexible-gallery-block');
				break;

				case 'icon_list':
					get_template_part('template-parts/flexible-icon-block');
				break;
				
			endswitch; 
			
			endwhile;
			
			endif;
			
			?>
	    
		</div>
	
	</div><!--c-->
	
	<div class="container pt2">
		<?php
	
		$args = array(
			'numberposts'  => -1,
			'post_type'    => 'information',
			'post__not_in' => array(get_the_ID())
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
