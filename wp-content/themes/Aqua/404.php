<?php get_header(); ?>

	<div class="row">
		<div class="sixteen columns">
		    <?php boc_breadcrumbs(); ?>
			<div class="page_heading"><h1><?php _e('404 - Page Not Found', 'Aqua');?></h1></div>
		</div>		
	</div>	
		
	<div class="row padded_block">
		<div class="sixteen columns">	
			<div class="warning closable"><?php _e('The page you are trying to access does not exist!', 'Aqua');?></div>
		</div>
	</div>
<?php get_footer(); ?>