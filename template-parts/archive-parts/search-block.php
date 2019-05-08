<?php $color = get_query_var('color'); ?>

<div class="sidebar-job-search">
	    
	<form role="search" method="get" class="<?php echo $color; ?>" action="<?php echo home_url('/'); ?>">
	
		<legend class="filter-label">Filter your job search</legend>
		
		<input name="s" type="search" value="<?php echo get_search_query(); ?>"
			   placeholder="<?php echo esc_attr_x('Job Title / Job Keywords', 'placeholder'); ?>" />
			   
		<input name="location" type="taxonomy" value="<?php echo get_search_query(); ?>"
			   placeholder="<?php echo esc_attr_x('Location', 'placeholder'); ?>" />
			   
		<?php
		
		$categories = get_categories('taxonomy=salary-range');
		
		if(sizeof($categories) > 0):
		
			usort($categories, function ($cat1, $cat2) {
				return $cat1->term_order <=> $cat2->term_order;
			});
		?>
		
			<div class="select-wrapper">
				
				<select name="salary" type="taxonomy" class="empty">
					
					<option value="" selected>Salary</option>
			
					<?php foreach($categories as $category): ?>
			
					<option value="<?php echo $category->slug; ?>"><?php echo $category->name; ?></option>
			
					<?php endforeach; ?>
				
				</select>
				
				<div class="icon-select"><i class="fas fa-arrow-down"></i></div>
			</div>
		
		<?php endif; ?>
		
		<input type="hidden" name="post_type" value="job" />
			   
		<input type="submit" class="search-submit" value="<?php echo esc_attr_x('Search', 'submit button') ?>" />
		
    </form>   

</div>