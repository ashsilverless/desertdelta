<?php
/**
 * ============== Template Name: Jobs Page
 *
 * @package desertdelta
 */
get_header();?>

<!-- ******************* Hero Content ******************* -->

<div class="content has-hero">

<?php get_template_part('template-parts/hero');?>

    <div class="container">
    
        <div class="row">
            
            <div class="col-6 pt3">
                
                <div class="jobs mb5">
	                
					<?php
                    
                    $jobs = get_posts(
                    	array(
	                    	'post_type' => 'job',
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

                <div class="sidebar-wrapper">
                    
                    <?php get_template_part('template-parts/sidebar');?>
                
                </div>
                
            </div><!--col-->            

        </div>
      
    </div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>