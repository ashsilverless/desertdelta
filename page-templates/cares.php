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
	
	<div class="container center">
		
		<?php get_template_part('template-parts/breadcrumb'); ?>
		
		<div class="row">
            
            <div class="col-6 offset-3 text-center mt2 mb5">
	                
                <?php get_template_part('template-parts/text-block');?>
                
            </div><!--col-->

        </div>
        
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
							
								<img style="background:url(<?php the_sub_field('image'); ?>)"/>
								
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
		
	</div><!--c-->
	
	<?php get_template_part('template-parts/map', 'camps');?>
    
    <?php get_template_part('template-parts/cta', 'itinerary');?>
    
    <?php get_template_part('template-parts/cta', 'newsletter');?>

</div><!--content-->
 
<?php get_footer(); ?>
