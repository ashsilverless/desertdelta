<?php
/**
 * ============== Template Name: Properties Page
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
        
        <div class="wrapper-destinations">
	        
	        <div class="menu">
		        
		        <button name="all" class="active">All</button>
		        
		        <?php
			        
				$terms = get_terms( 'destinations', array(
					'hide_empty' => false,
				));
				
				foreach($terms as $term): ?>
				
					<button name="<?php echo $term->slug; ?>"><?php echo $term->name; ?></button>
				
			    <?php endforeach; ?>
		        
	        </div>
			
			<?php
	
			$args = array(
				'numberposts' => -1,
				'post_type'   => 'camps',
				'orderby'     => 'title',
				'order'       => 'ASC'
			);
			$posts = get_posts( $args ); ?>
			
			<div class="wrapper-cards-horizontal">
				
			<?php foreach($posts as $post): ?>
			
				<div class="wrapper-card mb2 <?php echo get_the_terms($post->ID, 'destinations')[0]->slug; ?>">
					
				<?php
		
				set_query_var('post', $post);
				set_query_var('location', true);
				set_query_var('date', false);
				set_query_var('image_as_background', true);
				get_template_part('template-parts/info-card');
				
				?>
				
				</div>
			
			<?php endforeach; wp_reset_postdata(); ?>
		        
	        </div>
	        
        </div>
		
	</div><!--c-->
	
	<?php get_template_part('template-parts/map', 'camps');?>
	
	<?php get_template_part('template-parts/sub', 'hero'); ?>
    
    <?php get_template_part('template-parts/cta', 'itinerary');?>

</div><!--content-->
 
<?php get_footer(); ?>
