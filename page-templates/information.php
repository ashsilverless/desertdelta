<?php
/**
 * ============== Template Name: Information Page
 *
 * @package desertdelta
 */
 
get_header();?>

<!-- ******************* Hero Content ******************* -->

<div class="content has-hero">

<?php if( get_field('hero_background_image') ): 

    get_template_part('template-parts/hero');?>

<?php endif;?>

<!-- ******************* Hero Content END ******************* -->
	
	<div class="container container-information pb3">
		
		<?php get_template_part('template-parts/breadcrumb'); ?>
		
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
		
	</div><!--c-->
    
    <?php get_template_part('template-parts/cta', 'newsletter');?>
	
	<?php get_template_part('template-parts/map', 'camps');?>

    <?php get_template_part('template-parts/cta', 'contact');?> 

</div><!--content-->
 
<?php get_footer(); ?>
