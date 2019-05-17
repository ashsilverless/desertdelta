<div class="flexible-content gallery-block gallery pt2 pb1">
	
<?php 
	
$images = get_sub_field('gallery');

if( $images ): ?>

    <?php foreach( $images as $image ): $url = $image['url']; ?>
    
    <a href="<?php echo $image['url']; ?>" style='background-image: url(<?php echo $url; ?>)'></a>
    
    <?php endforeach; ?>
    
    
<?php endif; ?>
	
</div>