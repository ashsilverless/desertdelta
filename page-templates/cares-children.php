<?php
/**
 * ============== Template Name: Cares Children Page
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
	
	<div class="container">
		
	    <?php get_template_part('template-parts/breadcrumb'); ?>
	    
	    <div class="content pt2 dark-dot">
	    	<?php the_content(); ?>
	    </div>
	    
	    <?php
		
		$args = array(
			'numberposts'     => -1,
			'post_type'       => 'page',
			'post_parent__in' => array($post->post_parent),
			'post__not_in'    => array(get_the_ID())
		);
		$posts = get_posts( $args ); ?>
		
		<div class="wrapper-cards mt5">
			
		<?php foreach($posts as $post): ?>
		
			<div class="wrapper-card">
				
			<?php
	
			set_query_var('post', $post);
			get_template_part('template-parts/info-card-video');
			
			?>
			
			</div>
		
		<?php endforeach; ?>
		
		</div>
    
	</div>
	
	<?php get_template_part('template-parts/map', 'camps');?>
	
    <?php get_template_part('template-parts/cta', 'itinerary');?>
    
    <?php get_template_part('template-parts/cta', 'newsletter');?>

</div><!--content-->

<?php endwhile; ?>
 
<?php get_footer(); ?>
