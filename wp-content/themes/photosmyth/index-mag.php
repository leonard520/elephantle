                    	
                    <!-- Slider Section Starts Here -->
                        
                        
               		<?php if(of_get_option('custom_header_home') == 'true') : ?>                      
                        <div id="featured_section_header">                            
                            	<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
                        </div>              
                        <?php endif; ?>

               			<?php if( !of_get_option('custom_header_home') || of_get_option('custom_header_home') == 'false' ) : ?>                      
							<?php if(!of_get_option('show_magpro_slider_home') || of_get_option('show_magpro_slider_home') == 'true') : ?>  
                            <?php get_template_part( 'slider', 'wiltofull' ); ?>                
                            <?php endif; ?>
                    <?php endif; ?>  
                        

                    <!-- Slider Section ends Here -->