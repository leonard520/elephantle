



                </div>	
                <!-- Content Section ends here -->	
                
                <!-- Footer Section starts here -->
                <div id="footer_section">
                    
                    
                                            
                                                <div class="footercolumncopy">

                                                        <div class="footerp"><?php _e('&copy; All rights reserved.', 'PhotoSmyth') ?></div>
                                                        <?php if( is_home() || is_front_page() ): ?>
                                                        <div class="footercredit">
															<?php _e('Powered by ', 'PhotoSmyth') ?><a href="http://www.wordpress.org/"><?php _e('WordPress', 'PhotoSmyth') ?></a> <?php _e(' | ', 'PhotoSmyth') ?> <?php _e('Designed by ', 'PhotoSmyth') ?><a href="http://www.themealley.com/"><?php _e('ThemeAlley.Com', 'PhotoSmyth') ?></a>
                                                        </div>
                                                        <?php else: ?>
                                                        <div class="footercredit">
															<?php _e('Powered by ', 'PhotoSmyth') ?><a href="http://www.wordpress.org/"><?php _e('WordPress', 'PhotoSmyth') ?></a>
                                                        </div>                                                        
														<?php endif;?>
                                                </div>
                                                
                                            	<div class="footercolumn">
                                                	<?php dynamic_sidebar('footerleft'); ?>
                                                </div>                                                 
                                            
                                            	<div class="footercolumn">
                                                	<?php dynamic_sidebar('footercenter'); ?>
                                                </div>  
                                                
                                            	<div class="footercolumn">
                                                	<?php dynamic_sidebar('footerright'); ?>
                                                </div>                                                              
                    
                    
                    
                    
           
                 </div>	
                 <!-- Footer Section ends here -->	
                                                              
			</div>	
			<!-- Wrapper two ends here -->	
            
		</div>	
		<!-- Wrapper three ends here -->           
	</div>	
	<!-- Wrapper four ends here -->	            				
	</div>	
	<!-- Wrapper one ends here -->	
    <!-- Wrapper one ends here -->	



<?php wp_footer(); ?>
</body>
</html>