<?php
/**
 * Template Name: Template - Portfolio Page
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




		<!-- Portfolio -->
		<script type="text/javascript">
			jQuery(document).ready(function($){
		
		        var $filterType = $('#portfolio_filter div.current').attr('data-value');
		        var $holder = $('#portfolio_items');
		        var $data = $holder.clone();
		        var $preferences = {
		            duration: 600,
		            easing: 'easeInOutQuad'
		        };
				
				$('#portfolio_filter > div').click(function(e){

			          $('#portfolio_filter > div').removeClass('current');
			          var $filterType = $(this).attr('data-value');

			          $(this).addClass('current');
		            
			          if($filterType == 'all'){
			          		var $filteredData = $data.find('li');
			          }
			          else{
			          		var $filteredData = $data.find('li[data-type~=' + $filterType + ']');
			          }
			            
			          $holder.quicksand($filteredData, $preferences);

			     });
			 
			});
		</script>


		<div class="row">
			<div class="portfolio sixteen columns">

				
		<?php
		$portfolio_category = get_terms('portfolio_category');
		
		if($portfolio_category):
		?>
			<div id="portfolio_filter" class="portfolio_filter clearfix">
					<span><?php _e('Filter:', 'Aqua');?></span>
					<div data-value="all" class="current"><?php _e('All', 'Aqua');?></div>
			<?php foreach($portfolio_category as $portfolio_cat): ?>		
				<div data-value="<?php echo $portfolio_cat->slug; ?>"><?php echo $portfolio_cat->name; ?></div>
			<?php endforeach; ?>
			</div>
		<?php endif; ?>
		
		<ul id="portfolio_items" class="clearfix">
		<?php 
			$args = array(
				'post_type' => 'portfolio',
				'posts_per_page' => (ot_get_option('portfolio_items_per_page',9) ? ot_get_option('portfolio_items_per_page',9) : 9),
				'paged' => $paged
			);

			$gallery = new WP_Query($args);

			while($gallery->have_posts()): $gallery->the_post();
				if(has_post_thumbnail()):

				$data_types = '';
				$item_cats = get_the_terms($post->ID, 'portfolio_category');
				if($item_cats):
				foreach($item_cats as $item_cat) {
					$data_types .= $item_cat->slug . ' ';
				}
				endif;

				$full_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'portfolio-full'); ?>
				
				  <li data-id="<?php echo $post->ID;?>" class="portfolio_item" data-type="<?php echo $data_types;?>">
				  	<a href="<?php the_permalink(); ?>" rel="prettyPhoto" title="">
				  		<span class="pic"><?php the_post_thumbnail('portfolio-medium'); ?><div class="img_overlay"></div></span>
				  		<h4><?php the_title(); ?></h4>
				  	</a>
				  </li>			

			<?php endif; endwhile; ?>
		</ul>
		</div>
		<?php boc_pagination($gallery->max_num_pages, $range = 2); ?>
	</div>
<?php get_footer(); ?>