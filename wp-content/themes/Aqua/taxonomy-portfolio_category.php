<?php
get_header(); ?>

<div class="row">
	<div class="sixteen columns">
	    <?php boc_breadcrumbs(); ?>
		<div class="page_heading"><h1><?php single_cat_title(); ?></h1></div>
	</div>
</div>


		<div class="row">
			<div class="portfolio sixteen columns">

				<ul id="portfolio_items">							
				<?php
				while(have_posts()): the_post();
					if(has_post_thumbnail()):
				?>
					<li class="portfolio_item">
						<a href="<?php the_permalink(); ?>" title="">
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