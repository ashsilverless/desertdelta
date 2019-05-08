<?php 
$id 		 = $job->ID;
$salary 	 = get_field("salary", $id);
$time   	 = human_time_diff( get_the_time('U'), current_time('timestamp') ) . " ago";
$type		 = get_the_terms($id, 'type')[0]->name;
$title 		 = get_the_title($id);
$location 	 = get_the_terms($id, 'location')[0]->name;
$description = get_field("description", $id);
$link 		 = get_permalink($id);

$salary = $salary ? "£ " . number_format($salary, 0, '.', ',') : "";
?>

<?php $heroImage = get_field('image', $id);	
$defaultImage = get_field('default_job_image', 'options');?>


<?php if( get_field('image', $id)): ?>
	    
<div class="job-card block slide-right <?php echo strtolower($type); ?> " style="background-image: url(<?php echo $heroImage['url']; ?>);">
    	    
    <?php else: ?>

<div class="job-card block slide-right <?php echo strtolower($type); ?> " style="background-image: url(<?php echo $defaultImage['url']; ?>);">
    
    <?php endif;?>
    
    <div class="content">
	    
	    <h2 class="heading heading__sm"><?php echo $title; ?></h5>  
	    
	    <div class="description mt1 mb1"><?php echo substr(wp_strip_all_tags($description), 0, 110) . "..."; ?></div>
	    
	    <div class="info">
		    
		    <p class="salary"><?php echo $salary; ?></p>
		    
		    <h5 class="heading font200"><?php echo implode(" | ", [$location, $type]); ?></h5> 
		    
		    <p class="time"><i class="fas fa-clock"></i><?php echo $time; ?></p>      
		
	    </div>
    
    </div>
    
    <a href="<?php echo $link; ?>"><i class="fas fa-angle-double-right"></i></a>    
    
</div>