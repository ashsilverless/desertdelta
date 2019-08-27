<?php

$home_id = get_option("page_on_front");
$links   = get_field("sub_hero", $home_id)["links"];
$id      = get_the_id();

$all_pages = array_column($links, 'page');
?>

<div class="sub-hero <?php if(in_array($id, $all_pages)) echo 'half'; ?>">

    <?php
    
    foreach($links as $link): $page = $link["page"];
    
    	if(get_the_id() != $page):
    
	    	$url = "";
	    	$class = "";
	
			$image = get_field("hero_background_image", $page);
			
			if($image)
				$url = $image["url"];
				
			if(get_the_id() == $page)
				$class = "active"; ?>
				
			<a href="<?php echo get_permalink($page); ?>" class="sub-hero__item <?php echo $class; ?>" style="background-image: url(<?php echo $url; ?>);">
	    
		        <h3 class="heading heading__md heading__light heading__title-case mb0"><?php echo $link["sub_heading"]; ?></h3>
		        
		        <h3 class="heading heading__lg heading__light brand-dot"><?php echo $link["heading"]; ?></h3>
				
			</a>
		
		<?php endif; ?>
    
    <?php endforeach;?>

</div>