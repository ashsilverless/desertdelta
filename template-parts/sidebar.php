<div class="sidebar-cta submit-cv">
    
    <h2 class="heading heading__lg font400">Find Your Perfect Job In Catering</h2>
    
    <a href="/contact-us" class="button button__ghost button__fullwidth mt2">Submit CV</a>
    
</div>

<div class="sidebar">

    <h3 class="heading heading__md heading__alt-color mb1">Latest Jobs</h3>	
	
	<div class="jobs mb5">
	                
		<?php
        
        $jobs = get_posts(
        	array(
            	'post_type'      => 'job',
            	'posts_per_page' => 3,
            	'orderby'        => 'date',
                'order'          => 'DESC'
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
				
				include(get_template_directory() . '/template-parts/job-card.php');
			}
		}
        
        ?>
        
    </div>
    
</div>

<div class="sidebar-cta all-jobs text-center">
    
    <a href="/jobs" class="heading__light"><h2 class="heading heading__md font400">Search All Jobs</h2></a>
    
</div>