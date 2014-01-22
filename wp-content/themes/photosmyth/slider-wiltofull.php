                        <!-- Featured Section starts here -->
                        <div id="featured_section_wilto">	
                        
                            <div class="cycle-slideshow" 
                                data-cycle-fx=scrollHorz
                                data-cycle-timeout=10000
                                data-cycle-overlay-template='<div class="wcoverlay"><h2><a href="{{link}}">{{title}}</a></h2><p>{{desc}}</p></div>'>
                                <!-- empty element for overlay -->
                                <div class="cycle-overlay"></div>
                                
                                <div class="cycle-pager"></div>
                            	
								<?php if (have_posts()) : ?>
								<?php while (have_posts()) : the_post(); ?>
                                                                
                                <img src="<?php 
								
									if ( has_post_thumbnail()) { 
										$wiltoimage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'PhotoSmyththumbslider', false, '' );
										echo $wiltoimage[0];
                                    }else {
										$wiltoimage = get_stylesheet_directory_uri().'/images/PhotoSmythfeaturedthumb.jpg';
										echo $wiltoimage;
									}
									
															
								
								?>" data-cycle-title="<?php echo PhotoSmyth_get_limited_string(get_the_title(), 40, '...') ?>" data-cycle-desc="<?php echo PhotoSmyth_get_limited_string(get_the_excerpt(), 150, '...') ?>" data-cycle-link="<?php the_permalink(); ?>" >
                            
								<?php endwhile; ?>
                                <?php endif; ?>

                            </div>

                        </div>	
                        <!-- Featured Section ends here -->	                      
