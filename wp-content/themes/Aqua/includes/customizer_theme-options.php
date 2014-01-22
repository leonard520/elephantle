<?php

function aqua_customize_register($wp_customize) {

	$wp_customize->add_section( 'main_menu_styles_section', array(
	    'title'          => __( 'Main Menu Styles', 'Aqua' ),
	    'priority'       => 35,
	));	
	
  $wp_customize->add_setting( 'aqua_main_color', array(
    'default'        => '#0ad1e5',
    'transport' =>'postMessage',
    'priority'       => 1, 
    ));
  $wp_customize->add_setting( 'main_menu_style', array(
    'default'        => 'light_menu',
    'transport' =>'postMessage',
    'priority'       => 1, 
    ));

  $wp_customize->add_setting( 'nav_bgr_color', array(
    'default'        => '#0ad1e5',
    'transport' =>'postMessage',
    'priority'       => 3, 
    ));
    
    

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'aqua_main_color', array(
    'label'   => 'Main Color (Default: #0ad1e5)',
    'section' => 'colors',
    'settings'   => 'aqua_main_color',
    )));
    
	
    $wp_customize->add_control( 'main_menu_style', array(
	    'label'   => 'Select Navigation Style Preset:',
	    'section' => 'main_menu_styles_section',
	    'type'    => 'select',
	    'choices'    => array(
	        'dark_menu' => 'Dark Menu',
	        'light_menu' => 'Light Menu',
	        'custom_menu' => 'Custom Menu1',
	        'custom_menu2' => 'Custom Menu2',
	        ),
	));       
    
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nav_bgr_color', array(
    'label'   => 'Navigation BGR color (Custom Menu only)',
    'section' => 'main_menu_styles_section',
    'settings'   => 'nav_bgr_color',
    )));    
    
    
    
  // Get it on in preiview  
  if ( $wp_customize->is_preview() && ! is_admin() )
    add_action( 'wp_footer', 'aqua_customize_preview', 21);
}


function aqua_customize_preview() {
?>  
    
    <script type="text/javascript">
    ( function( $ ){
	    wp.customize('aqua_main_color',function( value ) {
	    	value.bind(function(to) {
	    		$('#footer').append('<style type="text/css">'+
	    			'	a:hover, a:focus { color:'+ to +'; }' +
	    			'	.button:hover,a:hover.button,button:hover,input[type="submit"]:hover,input[type="reset"]:hover,	input[type="button"]:hover, .button_hilite, a.button_hilite { color: #fff; background-color:'+ to +';}'+
	    			'	.button_hilite, a.button_hilite { color: #fff; background-color:'+ to +';}'+
	    			'	.button_hilite:hover, a:hover.button_hilite { color: #fff; background-color: #374045;}'+
	    			
	    			'	.section_big_title h1 strong { color:'+ to +';}'+
	    			'	.section_featured_texts h3 a:hover { color:'+ to +';}'+
	    			
	    		    '   .breadcrumb a:hover{ color: '+ to +';}'+
	    		    '   .post_meta a:hover{ color: '+ to +';}'+
	    		    '   .portfolio_filter div.current{ background-color: '+ to +';}'+
	    		   
	    		    '   .next:hover,.prev:hover{ background-color: '+ to +';}'+
	    		    '   .pagination .links a:hover{ background-color: '+ to +';}'+
	    		    '   .hilite{ background: '+ to +';}'+
					'   .price_column.price_column_featured ul li.price_column_title{ background: '+ to +';}'+

	    			'	.post_description blockquote{ border-left: 4px solid '+ to +'; }' +
		    		   
	    		    '   .info  h2{ background-color: '+ to +';}'+
	    		    '   #footer a:hover { color: '+ to +';}'+
	    		    '   #footer .boc_latest_post img:hover{ border: 3px solid '+ to +';}'+

	    			'	.jcarousel-next-horizontal:hover, .jcarousel-prev-horizontal:hover { background-color:'+ to +';}'+
		 	'</style>');
	    	 });
	    });

	    wp.customize('main_menu_style',function( value ) {
	        value.bind(function(to) {
	        	$('#menu').parent().removeClass('custom_menu').removeClass('custom_menu2').removeClass('light_menu').removeClass('dark_menu').addClass(to);
	        });
	    });

	    wp.customize('nav_bgr_color',function( value ) {
	        value.bind(function(to) {
	        	$('#footer').append('<style type="text/css">'+
	        		'   .custom_menu #menu, .custom_menu #menu > ul > li > a { background-color: '+ to +';}'+
	        		'   .custom_menu2 #menu > ul > li > a:hover, .custom_menu2 #menu > ul > li:hover > a, .custom_menu2 #menu > ul > li ul > li > a:hover > span { background-color: '+ to +';}'+	
			 	'</style>');
	        });
	    });     

	} )( jQuery )
    </script>
    <?php 
}