<?php 
/**
 * Template Name: Template - Full Width
 *
 * A Full Width custom page template without sidebar.
 * @package WordPress
 */


get_header(); ?>

<?php if((is_page() || is_single()) && !is_front_page()): ?>
<div class="row">
	<div class="sixteen columns">
	    <?php boc_breadcrumbs(); ?>
		<div class="page_heading"><h1><?php the_title(); ?></h1></div>
	</div>
</div>
<?php else: ?>
<div class="h15"></div>
<?php endif; ?>


	<div class="row">

		<!-- Post -->
		<div <?php post_class(''); ?> id="post-<?php the_ID(); ?>" >
			<div class="sixteen columns">
				<?php while (have_posts()) : the_post(); ?>
				<?php the_content() ?>
				<?php wp_link_pages(); ?>
				<?php endwhile; ?>
			</div>
		</div>
		<!-- Post :: END -->
		
	</div>	

<?php get_footer(); ?>	