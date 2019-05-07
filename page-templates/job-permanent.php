<?php
/**
 * ============== Template Name: Permanent Jobs
 *
 * @package desertdelta
 */
get_header();?>

<!-- ******************* Hero Content ******************* -->

<div class="content has-hero">

<?php if( get_field('hero_background_image') ): 

    get_template_part('template-parts/hero');?>

<?php endif;?>

    <div class="container">
    
        <div class="row">
            
            <div class="col-6 pt3">
                
                <div class="mb5">
                    <?php get_template_part('template-parts/text-block');?>
                </div>
                
                <div class="jobs mb5">
	                
					<?php
                    
                    $jobs = get_posts(
                    	array(
	                    	'post_type' => 'job',
							'tax_query' => array(
								array(
									'taxonomy' => 'type',
									'field'    => 'slug',
									'terms'    => 'permanent'
								)
							)
						)
					);
					
					if($jobs) {
						foreach($jobs as $job) {
							$id 		 = $job->ID;
							$salary 	 = get_field("salary", $id);
							$time   	 = human_time_diff( get_the_time('U'), current_time('timestamp') ) . " ago";
							$type		 = get_the_terms($id, 'type')[0]->name;
							$title 		 = get_the_title($id);
							$location 	 = get_the_terms($id, 'location')[0]->name;
							$description = get_field("description", $id);
							$link 		 = get_permalink($id);
							
							$salary = $salary ? "£ " . number_format($salary, 0, '.', ',') : "";
							
							include(get_template_directory() . '/template-parts/job-card-search.php');
						}
					}
                    
                    ?>
                    
                </div>
                
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
 
<?php get_footer(); ?>
