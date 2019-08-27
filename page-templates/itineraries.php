<?php
/**
 * ============== Template Name: Itineraries Page
 *
 * @package desertdelta
 */
 
get_header();?>

<!-- ******************* Hero Content ******************* -->

<div class="content has-hero">

<?php if( get_field('hero_background_image') ): 

    get_template_part('template-parts/hero');

endif;?>

<!-- ******************* Hero Content END ******************* -->
	
	<div class="container large">
		
		<div class="row">
            
            <div class="col-8 offset-2 mt5 text-center mb5">
	                
                <?php get_template_part('template-parts/text-block');?>
                
            </div><!--col-->

        </div>
        
        <?php
		
		$args = array(
			'numberposts' => -1,
			'post_type'   => 'itineraries'
		);
		$posts = get_posts( $args ); ?>
		
		<div class="wrapper-cards">
			
		<?php foreach($posts as $post): ?>
		
			<div class="wrapper-card">
				
			<?php
	
			set_query_var('post', $post);
			set_query_var('date', false);
			get_template_part('template-parts/info-card');
			
			?>
			
			</div>
		
		<?php endforeach; wp_reset_postdata(); ?>
		
		</div>
		
	</div><!--c-->
	
	<?php get_template_part('template-parts/map', 'camps');?>
	
	<?php get_template_part('template-parts/sub', 'hero'); ?>

</div><!--content-->
 
<?php get_footer(); ?>
