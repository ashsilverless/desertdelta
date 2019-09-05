<?php
/**
 * ============== Template Name: News Page
 *
 * @package desertdelta
 */
 
get_header();?>

<!-- ******************* Hero Content ******************* -->

<div class="content has-hero">

<?php if( get_field('hero_background_image') ): 

    get_template_part('template-parts/hero');?>

<?php endif;?>
	
	<div class="container-news">
		
		<?php get_template_part('template-parts/breadcrumb'); ?>
		
		<div class="container large">
			<?php get_template_part('template-parts/latest-news'); ?>
		</div>
		
		<div class="all-news">
			
			<div class="container content-news">
			
				<h2 class="heading heading__lg center dark-dot slide-down mb3">Archive</h2>
				
				
				<?php 
					
					$posts = get_posts( array( 'numberposts' => -1 ) );
					
					$controls = array();
					$control_name = array();
					
					foreach ($posts as $post) {
						$camp = get_field( "camp", $post->ID );
						$post->camp = $camp->post_name;
						
						if(!in_array($camp->post_name, $control_name)) {
							array_push($control_name, $camp->post_name);
							array_push($controls, $camp);
						}
					}
						
				?>
				
				<div class="mix-it-up">
					
					<div class="mix-it-up__controls">
						
						<button type="button" data-filter="all">Show all</button>
						
						<?php foreach($controls as $control): ?>
							
						<button type="button" data-filter=".<?php echo $control->post_name; ?>"><?php echo $control->post_title; ?></button>
							
						<?php endforeach; ?>
					
					</div>
					
					<div class="mix-it-up__container">
						
						<?php foreach($posts as $post): ?>
							
						<div class="mix <?php echo $post->camp; ?>">
							
							<?php
								set_query_var('post', $post);
								set_query_var('date', true);
								get_template_part('template-parts/info-card');
							?>
								
						</div>
							
						<?php endforeach; ?>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		
	</div><!--c-->
 
    <?php get_template_part('template-parts/cta', 'newsletter');?> 
	
    <?php get_template_part('template-parts/map', 'camps');?>

    <?php get_template_part('template-parts/cta', 'cares');?>
    
    <hr>
    
    <?php get_template_part('template-parts/cta', 'itinerary');?>

</div><!--content-->
 
<?php get_footer(); ?>
