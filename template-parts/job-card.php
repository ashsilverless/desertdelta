<?php $heroImage = get_field('image', $id);	
$defaultImage = get_field('default_job_image', 'options');?>

<?php if( get_field('image', $id)): ?>
	    
<div class="job-card <?php echo strtolower($type); ?>" style="background-image: url(<?php echo $heroImage['url']; ?>);">
    	    
    <?php else: ?>

<div class="job-card <?php echo strtolower($type); ?>" style="background-image: url(<?php echo $defaultImage['url']; ?>);">
    
    <?php endif;?>
    
    <div class="content">
    
    <p class="salary"><?php echo $salary; ?></p>
    
    <p class="time"><i class="fas fa-clock"></i><?php echo $time; ?></p>
    
    <h5 class="heading heading__xs heading__secondary-color font200 mb0"><?php echo $type; ?></h5>
    <h2 class="heading heading__sm heading__secondary-color mb0"><?php echo $title; ?></h5>
    <h5 class="heading heading__xs heading__secondary-color font200 mb2"><?php echo $location; ?></h5>            
    
    <p class="description"><?php echo substr(wp_strip_all_tags($description), 0, 110) . "..."; ?></p>
    
    </div>
    
    <a href="<?php echo $link; ?>"><i class="fas fa-user-alt"></i> Apply Now</a>    
    
</div>