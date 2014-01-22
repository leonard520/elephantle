<?php get_header(); ?>
	
<div class="row">
	<div class="sixteen columns">
	    <?php boc_breadcrumbs(); ?>
		<div class="page_heading"><h1><?php the_title(); ?></h1></div>
	</div>
</div>
		
<div class="row">		
	<div class="twelve columns">
		
		<!-- Post -->
		<?php while (have_posts()) : the_post(); ?>
		<div <?php post_class('post-page'); ?> id="post-<?php the_ID(); ?>" >
			
					<!-- Post Begin -->
					<div class="clearfix">
											
					<?php
					$args = array(
					    'post_type' => 'attachment',
					    'numberposts' => '5',
					    'post_status' => null,
					    'post_parent' => $post->ID,
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'exclude' => get_post_thumbnail_id()
					);
					$attachments = get_posts($args);
					if($attachments || has_post_thumbnail()):
					?>					
											
											
						<!-- FlexSlider -->
						<div class="flexslider">
					        <ul class="slides">
					        	<?php if(has_post_thumbnail()): ?>
								<?php $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'portfolio-main'); ?>
								<?php $full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
								<?php $attachment_data = wp_get_attachment_metadata(get_post_thumbnail_id()); ?>
								<li class="pic">
									<a href="<?php echo $full_image[0]; ?>" rel="prettyPhoto['services']" title="<?php the_title(); ?>">
										<img src="<?php echo $attachment_image[0]; ?>" alt="" /><span class="img_overlay_zoom"></span>
									</a>
								</li>
								<?php endif; ?>
								
					        	<?php foreach($attachments as $attachment): ?>
								<?php $attachment_image = wp_get_attachment_image_src($attachment->ID, 'portfolio-main'); ?>
								<?php $full_image = wp_get_attachment_image_src($attachment->ID, 'full'); ?>
								<?php $attachment_data = wp_get_attachment_metadata($attachment->ID); ?>
								<li class="pic">
									<a href="<?php echo $full_image[0]; ?>" rel="prettyPhoto['services']" title="<?php echo $attachment->post_title; ?>">
										<img src="<?php echo $attachment_image[0]; ?>" alt="<?php echo $attachment->post_title; ?>" /><span class="img_overlay_zoom"></span>
									</a>
								</li>
								<?php endforeach; ?>
					        </ul>
					    </div>
						<!-- FlexSlider :: END -->
						
					<?php endif; ?>	
					
						<div class="post_description clearfix">
						<?php the_content(); ?>
						</div>
					</div>
					<!-- Post End -->
	
			
		</div>
		<?php endwhile; // Loop End  ?>
		<!-- Post :: End -->
		
		<?php //comments_template('', true); ?>
		
	</div>	
		
	<?php get_sidebar(); ?>
		
</div>	

	
<?php get_footer(); ?>	