<?php 
get_header(); ?>

<div class="row">
	<div class="sixteen columns">
	    <?php boc_breadcrumbs(); ?>
		<div class="page_heading mb0"><h1><?php the_title(); ?></h1></div>
	</div>
</div>



	<div class="row padded_block portfolio_page">
	
	<?php while(have_posts()): the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
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
			<div class="flexslider ten columns mt20">
		        <ul class="slides">
		        	<?php if(has_post_thumbnail()): ?>
					<?php $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
					<?php $full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
					<?php $attachment_data = wp_get_attachment_metadata(get_post_thumbnail_id()); ?>
					<li class="pic">
						<a href="<?php echo $full_image[0]; ?>" rel="prettyPhoto['portfolio']" title="<?php the_title(); ?>">
							<img src="<?php echo $attachment_image[0]; ?>" alt="" /><span class="img_overlay_zoom"></span>
						</a>
					</li>
					<?php endif; ?>
		        	<?php foreach($attachments as $attachment): ?>
					<?php $attachment_image = wp_get_attachment_image_src($attachment->ID, 'full'); ?>
					<?php $full_image = wp_get_attachment_image_src($attachment->ID, 'full'); ?>
					<?php $attachment_data = wp_get_attachment_metadata($attachment->ID); ?>
					<li class="pic">
						<a href="<?php echo $full_image[0]; ?>" rel="prettyPhoto['portfolio']" title="<?php echo $attachment->post_title; ?>">
							<img src="<?php echo $attachment_image[0]; ?>" alt="" /><span class="img_overlay_zoom"></span>
						</a>
					</li>
					<?php endforeach; ?>
		        </ul>
		    </div>
			<!-- FlexSlider :: END -->
			
			<?php endif; ?>
			
			<div class="five columns portfolio_description">
				<?php the_content(); ?>
			</div>

		</div>
	</div>


<?php if(ot_get_option('related_portfolio_projects')){ ?>
		<?php $projects = get_related_portfolio_items($post->ID); ?>
		<?php if($projects->have_posts()): ?>
		<div class="row">
			<h2 class="title sixteen columns"><span><?php _e('Related Portfolio Items', 'Aqua'); ?></span></h2>
			<div class="clear"></div>
			<div class="half_padded_block carousel_section">
				<div class='carousel_arrows_bgr'></div>
				<ul id="portfolio_carousel">
					<?php while($projects->have_posts()): $projects->the_post(); ?>
					<?php if(has_post_thumbnail()): ?>
					<li class="four columns portfolio_item">
						<a href="<?php the_permalink(); ?>">
					  		<span class="pic"><?php the_post_thumbnail('portfolio-medium'); ?><div class="img_overlay"></div></span>
					  		<h5><?php the_title(); ?></h5>
					  	</a>
					</li>	
					<?php endif; endwhile; ?>		
				</ul>
			</div>
		</div>
				
		<script type="text/javascript">
			jQuery(document).ready(function() {
			    jQuery('#portfolio_carousel').jcarousel({
			    	scroll: (jQuery(window).width() > 767 ? 4 : 1),
			    	easing: 'easeInOutExpo',
			    	animation: 600
			    });
			});	
			
			
			// Reload carousels on window resize to scroll only 1 item if viewport is small
		    jQuery(window).resize(function() {
		    	 var el = jQuery("#portfolio_carousel"), carousel = el.data('jcarousel'), win_width = jQuery(window).width();
		    	   var visibleItems = (win_width > 767 ? 4 : 1);
		    	   carousel.options.visible = visibleItems;
		    	   carousel.options.scroll = visibleItems;
		    	   carousel.reload();
		    });
		</script>
		
		
		<?php endif; ?>
<?php } // RELATED PREJECTS :: END ?>


	<?php endwhile; // END LOOP ?>


<?php get_footer(); ?>