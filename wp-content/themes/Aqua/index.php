<?php 
/**
 * The Default template file.
 * 
 * @package WordPress
 */


get_header(); ?>


<?php if(is_archive() || is_search() || is_home()): ?>
<div class="row">
	<div class="sixteen columns">
	    <?php boc_breadcrumbs(); ?>
		<div class="page_heading"><h1><?php echo (is_archive() ? single_cat_title() : (is_search() ? _e('Search results for:', 'Aqua').' '. get_search_query(): (is_home() ? wp_title('') :'') ));?></h1></div>
	</div>
</div>
<?php else: ?>
<div class="h10"></div>
<?php endif; ?>


	<div class="row">

		<?php 
			// Check where sidebar should be
			$sidebar_left = false; 
			if(ot_get_option('sidebar_layout','right-sidebar')=='left-sidebar'){
				$sidebar_left=true;
			}
			// Place sidebar if it's left
			($sidebar_left ? get_sidebar() : '');
		?>

			<div class="twelve columns">
				
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					
					<!-- Post Loop Begin -->
					<div class="post_item clearfix">
					
						
		<?php // IF Post type is Standard (false) 	
			if(function_exists( 'get_post_format' ) && get_post_format( $post->ID ) != 'gallery' && get_post_format( $post->ID ) != 'video' && has_post_thumbnail()) { 
					$thumbbig = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'portfolio-full' );
					$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'portfolio-main');
					
		?>
						<div class="pic">
							<a href="<?php the_permalink(); ?>" title="<?php echo $post->post_title; ?>">
								<img src="<?php echo $attachment_image[0]; ?>"/><div class="img_overlay"></div>
							</a>
						</div>
		<?php } // IF Post type is Standard :: END ?>
		
		<?php // IF Post type is Gallery
		if (( function_exists( 'get_post_format' ) && get_post_format( $post->ID ) == 'gallery' )) {
					$args = array(
                            'numberposts' => -1, // Using -1 loads all posts
                            'orderby' => 'menu_order', // This ensures images are in the order set in the page media manager
                            'order'=> 'ASC',
                            'post_mime_type' => 'image', // Make sure it doesn't pull other resources, like videos
                            'post_parent' => $post->ID, // Important part - ensures the associated images are loaded
                            'post_status' => null,
                            'post_type' => 'attachment'
                            );

					$images = get_children( $args );
					
					if($images){ ?>
					
					<div class="flexslider">
				        <ul class="slides">
						<?php foreach($images as $image){ 
						//		$attachment = wp_get_attachment_image_src($image->ID, 'portfolio-full');
								$thumb = wp_get_attachment_image_src($image->ID,'portfolio-main');
								?>
								<li class="pic">
										<a href="<?php the_permalink(); ?>" title="<?php echo $image->post_title; ?>" >
											<img src="<?php echo $thumb[0] ?>"/><div class="img_overlay"></div>
										</a>
								</li>
						<?php } ?>						
						</ul>  
					</div>
					
					<?php } // If Images :: END ?> 
						
				
		<?php } // IF Post type is Gallery :: END ?>
		
		<?php	// IF Post type is Video 
				if (( function_exists( 'get_post_format' ) && get_post_format( $post->ID ) == 'video')  ) {					
					if($video_embed_code = get_post_meta($post->ID, 'video_embed_code', true)) {
						echo "<div class='video_max_scale'>";
						echo $video_embed_code;
						echo "</div>";
					}										
				} // IF Post type is Video :: END 
		?>
						
										
						<h3 class="post_title"><a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('Permalink to %s', 'Aqua'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h3>
						
						<p class="post_meta">
							<span class="calendar"><?php printf('<a href="%1$s">%2$s</a>', get_permalink(), get_the_date()); ?></span>
							<span class="author"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID' )); ?>"><?php echo __('By ','Aqua');?> <?php the_author_meta('display_name'); ?></a></span>
							<span class="comments"><?php  comments_popup_link( __('No comments yet','Aqua'), __('1 comment','Aqua'), __('% comments','Aqua'), 'comments-link', __('Comments are Off','Aqua'));?></span>
							<span class="tags"><?php the_category(', '); ?></span>
						</p>
					
						<div class="post_description clearfix">
						<?php the_content(); ?>
						</div>
					</div>
					<!-- Post Loop End -->
					
				<?php endwhile; ?>
				
				<?php boc_pagination($pages = '', $range = 2); ?>
				
				<?php else: ?>
				<p><?php _e('Sorry, no posts matched your criteria.','Aqua'); ?></p>
				<?php endif; // Loop End  ?>
	
			</div>
		
		
		<?php // Place sidebar if it's right
			  (!$sidebar_left ? get_sidebar() : '');?>
		
	</div>	

	
<?php get_footer(); ?>	