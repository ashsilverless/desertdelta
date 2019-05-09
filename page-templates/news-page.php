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
	
	<div class="container container-news">
		
		<div class="container">
			<?php get_template_part('template-parts/latest-news'); ?>
		</div>
		
		<div class="all-news">
			
			<div class="container">
			
				<h2 class="heading heading__lg center dark-dot slide-up mb3">Archive</h2>
				
				
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
								get_template_part('template-parts/news-card');
							?>
								
						</div>
							
						<?php endforeach; ?>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		
	</div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>
