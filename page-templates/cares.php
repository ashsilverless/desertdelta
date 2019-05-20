<?php
/**
 * ============== Template Name: Cares Page
 *
 * @package desertdelta
 */
 
get_header();?>

<!-- ******************* Hero Content ******************* -->

<div class="content has-hero cares-hero">

<?php if( get_field('hero_background_image') ): 

    get_template_part('template-parts/hero');?>

<?php endif;?>

<!-- ******************* Hero Content END ******************* -->
	
	<div class="container center mb4">
		
		<?php get_template_part('template-parts/breadcrumb'); ?>
		
		<div class="row">
            
            <div class="col-6 offset-3 text-center mt2 mb5">
	                
                <?php get_template_part('template-parts/text-block');?>
                
            </div><!--col-->

        </div>
        
        <div class="wrapper-timeline">
	        
	        <div class="content-timeline">
	        
		        <table class="table-cares">
				    
			    <?php
		
				if( have_rows('letters') ):
			
					while ( have_rows('letters') ) : the_row(); ?>
					
					<tr>
						<th>
							<div class="heading heading__secondary-color font600">
								<div class="circle large"><?php the_sub_field('name'); ?></div>
							</div>
						</th>
						
						<td class="pb2">
					
							<div class="item-timeline">
								
								<h3 class="heading"><?php the_sub_field('title'); ?></h3>
								
								<div class="collapsible">
									
									<?php if(get_sub_field('image')): ?>
								
									<div class="img" style="background:url(<?php the_sub_field('image'); ?>)"></div>
									
									<?php endif; ?>
									
									<div class="text">
									
										<div><?php the_sub_field('description'); ?></div>
										
									</div>
								</div>
								
							</div>
						</td>
					
					</tr>
						
					<?php endwhile;
					
				endif;
				    
				?>
				
			    </table>
	        </div>
        </div>
		
	</div><!--c-->
	
	<div class="cares-videos">
	
		<div class="container">
			
			<h2 class="heading heading__md center dark-dot slide-down mb2">Cares Videos</h2>
			
			
			<?php
		
			$args = array(
				'numberposts' => -1,
				'post_type'   => 'page',
				'post_parent__in' => array(get_the_ID())
			);
			$posts = get_posts( $args ); ?>
			
			<div class="wrapper-cards">
				
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
		
	</div>
	
	<?php get_template_part('template-parts/map', 'camps');?>
    
    <?php get_template_part('template-parts/cta', 'itinerary');?>
    
    <?php get_template_part('template-parts/cta', 'newsletter');?>

</div><!--content-->
 
<?php get_footer(); ?>
