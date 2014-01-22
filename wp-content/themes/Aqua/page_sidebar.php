<?php 
/**
 * Template Name: Template - Page + SideBar
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
<?php endif; ?>
		
		
	<div class="row">

		<!-- Post -->
		<div <?php post_class(''); ?> id="post-<?php the_ID(); ?>" >
			<div class="twelve columns">
				<?php while (have_posts()) : the_post(); ?>
				<?php the_content() ?>
				<?php endwhile; ?>
			</div>
		</div>
		<!-- Post :: END -->
			
		<?php get_sidebar(); ?>
		
	</div>	

<?php get_footer(); ?>	