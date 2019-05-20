<div class="flexible-content data-block pt2 pb1">
	
<?php if( have_rows('data') ): ?>

<table>
	
	<tr>
		<th>Description</th>
		<th>Requirements</th>
	</tr>

<?php while ( have_rows('data') ) : the_row(); ?>

	<tr>
	    <td><?php the_sub_field('description'); ?></td>
	    <td><div><?php the_sub_field('requirements'); ?></div></td>
	</tr>

<?php endwhile; ?>

</table>

<?php endif; ?>
	
</div>