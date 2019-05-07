<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package desertdelta
 */
 
get_header();?>

<!-- ******************* Hero Content ******************* -->

<div class="content has-hero">

	<?php 
	    if( get_field('hero_type') == 'image' ): 
	        $heroImage = get_field('hero_background_image');
	    elseif ( get_field('hero_type') == 'color' ): 
	        $heroColor = get_field('hero_background_colour');
	    endif;
	?>
	
	<?php 
	    if( get_field('hero_type') !== 'slider'):
	?>
	
	<div class="hero h50" style="background-image: url(<?php echo get_template_directory_uri() . "/inc/img/job-hero.jpg"; ?>); background-color: <?php echo $heroColor; ?>;">
	
	    <div class="container">
	    
	        <div class="row">
	                
	            <div class="hero__content">       
	
				    <?php $brandImage = get_field('logo', 'options');?>	
				
					<a href="<?php echo home_url(); ?>" alt="<?php wp_title(''); ?>" title="<?php wp_title(''); ?>" class="logo">
						
						<img src="<?php echo $brandImage['url'];?>" alt="" title=""/>
						
					</a>
	
	                <h1 class="heading heading__xl heading__light">Search Results</h1>
	           
	            </div>       
	                
	        </div>
	    
	    </div>
	    
	</div><!--hero-->
	
	<?php endif;?>

    <div class="container">
    
        <div class="row">
            
            <div class="col-6 pt3">
	            
	            <?php
			
					$filter = array();
					
					if($s)
						array_push($filter, $s);
					if($location)
						array_push($filter, $location);
					if(isset($_GET['salary']) && $_GET['salary']) {
						$term = get_term_by('slug', $_GET['salary'], 'salary-range');
						array_push($filter, $term->name);
					}
					
				?>
				
				<p class="heading__sm font400">You searched for:
				<?php echo implode(" & ", $filter); ?></p>
	            
	            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
				<div id="post-<?php the_ID(); ?>" class="posts">
				
					<article>
						
						<?php
							$id 		 = get_the_ID();
							$salary 	 = get_field("salary", $id);
							$time   	 = get_the_date('j F Y', $id);
							$type		 = get_the_terms($id, 'type')[0]->name;
							$title 		 = get_the_title($id);
							$location 	 = get_the_terms($id, 'location')[0]->name;
							$description = get_field("description", $id);
							$link 		 = get_permalink($id);
							
							$salary = $salary ? "£ " . number_format($salary, 0, '.', ',') : "";
							
							include 'template-parts/job-card-search.php';
						?>
		
					</article><!-- #post -->
					
				</div>
				
				<?php endwhile; else: ?>
				
				<div class="alert alert-info">

					<p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
				
				</div>
				
				<?php endif; ?>
                
            </div><!--col-->
            
            <div class="col-5 offset-1 sticky-sidebar">
	            
	            <?php
		            set_query_var('color', 'brand-secondary'); // Primary or Secondary
		            get_template_part('template-parts/search-block');
		        ?>

                <?php get_template_part('template-parts/sidebar');?>
                
            </div><!--col-->            

        </div>
      
    </div><!--c-->

</div><!--content-->

<?php get_footer();
