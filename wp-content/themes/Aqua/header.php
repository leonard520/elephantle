<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php	     
	    // Page or Single Post
	    if ( is_page() or is_single() ) {
	        the_title();	 
	    // Category Archive
	    } elseif ( is_category() ) {
	        echo single_cat_title('', false);	 
	    // Tag Archive
	    } elseif ( function_exists('is_tag') and function_exists('single_tag_title') and is_tag() ) {
	        printf( __('Tag: %s','Aqua'), single_tag_title('', false) );	 
	    // General Archive
	    } elseif ( is_archive() ) {
	        printf( __('Archive: %s','Aqua'), wp_title('', false) );	 
	    // Search Results
	    } elseif ( is_search() ) {
	        printf( __('Search: %s','Aqua'), get_query_var('s') );
	    }	 
	    // Insert separator for the titles above
	    if ( !is_home() and !is_404() ) {
	        echo " - ";
	    }	     
	    // Finally the blog name
	    bloginfo('name');	 
	    ?></title>

	<meta name="description" content="<?php bloginfo('description'); ?>" />

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,300,600' rel='stylesheet' type='text/css'>
	
	<?php 
	$fonts_already_loaded = array("Open+Sans");
	$fonts_to_load = array();

	// Load Nav Font 
	if(!in_array(($nav_font = ot_get_option('nav_font_family')), $fonts_already_loaded)) {
		$fonts_to_load[] = $nav_font;
	}
	// Load Headings Font 
	if(!in_array(($heading_font = ot_get_option('heading_font_family')), $fonts_already_loaded)) {
		$fonts_to_load[] = $heading_font;
	}
	// Load Buttons Font 
	if(!in_array(($button_font = ot_get_option('button_font_family')), $fonts_already_loaded)) {
		$fonts_to_load[] = $button_font;
	}
	
	
	
	// Loading fonts
	foreach($fonts_to_load as $font){
		echo "<link href='http://fonts.googleapis.com/css?family=".$font."' rel='stylesheet' type='text/css'>\n\t";
		
	}
	
	
	
	// Apply Dynamic CSS
	echo "<style type='text/css'>";
	
	// Nav font family
	if($nav_font!="Open+Sans"){
		echo "
		#menu {
			font-family: '".str_replace('+',' ',$nav_font)."';
		}\n";		
	}
	// Nav font size
	if(($nav_font_size=ot_get_option('nav_font_size'))!="16px"){
		echo "
		#menu > ul > li > a {
			font-size: ".$nav_font_size.";
		}
		#menu > ul > li ul > li > a {
			font-size: ".((int)(substr($nav_font_size,0,2)) - 2).'px'.";
		}\n";
	}
	// Custom Menu BGR color
	if( (($nav_bgr_color=get_theme_mod('nav_bgr_color'))!="#0ad1e5") && ((get_theme_mod('main_menu_style') == 'custom_menu')||(get_theme_mod('main_menu_style') == 'custom_menu2'))){
		echo "
		.custom_menu #menu, .custom_menu #menu > ul > li > a {
			background-color: ".$nav_bgr_color.";
		}
		.custom_menu2 #menu > ul > li > a:hover, .custom_menu2 #menu > ul > li:hover > a, .custom_menu2 #menu > ul > li ul > li > a:hover > span {
			background-color: ".$nav_bgr_color.";
		}\n";
	}
	
	
	// Main Color
	if(($aqua_main_color=get_theme_mod('aqua_main_color'))!="#0ad1e5"){
		echo '	
		a:hover, a:focus { color: '.$aqua_main_color.' ; }
		.button:hover,a:hover.button,button:hover,input[type="submit"]:hover,input[type="reset"]:hover,	input[type="button"]:hover, .button_hilite, a.button_hilite { color: #fff; background-color: '.$aqua_main_color.' ;}
		.button_hilite, a.button_hilite { color: #fff; background-color: '.$aqua_main_color.' ;}
		.button_hilite:hover, a:hover.button_hilite { color: #fff; background-color: #374045;}
				
		.section_big_title h1 strong { color: '.$aqua_main_color.' ;}
		.section_featured_texts h3 a:hover { color: '.$aqua_main_color.' ;}
				
		.breadcrumb a:hover{ color:  '.$aqua_main_color.' ;}
		.post_meta a:hover{ color:  '.$aqua_main_color.' ;}
		.portfolio_filter div.current{ background-color:  '.$aqua_main_color.' ;}
			   
		.next:hover,.prev:hover{ background-color:  '.$aqua_main_color.' ;}
		.pagination .links a:hover{ background-color:  '.$aqua_main_color.' ;}
		.hilite { background:  '.$aqua_main_color.' ;}
		.price_column.price_column_featured ul li.price_column_title { background:  '.$aqua_main_color.' ;}
		
		.post_description blockquote{ border-left: 4px solid '.$aqua_main_color.'; }
			   
		.info  h2{ background-color:  '.$aqua_main_color.' ;}
		#footer a:hover { color:  '.$aqua_main_color.' ;}
		#footer .boc_latest_post img:hover{ border: 3px solid  '.$aqua_main_color.' ;}
		
		.jcarousel-next-horizontal:hover, .jcarousel-prev-horizontal:hover { background-color: '.$aqua_main_color.' ;}
		'."\n";
	}	
	
	

	// Headings font family
	if($heading_font!="Open+Sans"){
		echo "
		h1, h2, h3, h4, h5, .title, .section_big_title h1, .heading, #footer h3 {
			font-family: '".str_replace('+',' ',$heading_font)."';
		}\n";		
	}	
	// Button font family
	if($button_font!="Open+Sans"){
		echo "
		.button, a.button, button, input[type='submit'], input[type='reset'], input[type='button'] {
			font-family: '".str_replace('+',' ',$button_font)."';
		}\n";		
	}	
	// Body font family
	$body_font = ot_get_option('body_font_family');
	if($body_font!="Open+Sans"){
		echo "
		body {
			font-family: '".str_replace('+',' ',$body_font)."';
		}\n";		
	}	

	// Breadcrumbs
	if(!$boc_breadcrumb = ot_get_option('breadcrumbs')){
		echo "
		.breadcrumb {
			display: none;
		}\n";
	}

	// Custom CSS
	if($boc_custom_css = ot_get_option('custom_css')){
		echo "\n\n".$boc_custom_css."\n";
	}	
	
	
	echo "\t</style>";
	?>
	
	
	<!-- JS
  ================================================== -->	
	
	<?php wp_enqueue_script('jquery'); ?>
	<?php wp_enqueue_script('jquery.easing', get_template_directory_uri().'/js/jquery.easing.1.3.js'); ?>
	<?php wp_enqueue_script('aqua.common', get_template_directory_uri().'/js/aqua.common.js'); ?>
	<?php wp_enqueue_script('jquery.quicksand', get_template_directory_uri().'/js/jquery.quicksand.js'); ?>
	<?php wp_enqueue_script('jquery.flexslider', get_template_directory_uri().'/js/jquery.flexslider-min.js'); ?>
	<?php wp_enqueue_script('jquery.prettyPhoto', get_template_directory_uri().'/js/jquery.prettyPhoto.js'); ?>	
	<?php wp_enqueue_script('jquery.jcarousel', get_template_directory_uri().'/js/jquery.jcarousel.min.js'); ?>
	<?php wp_enqueue_script('jquery.tipsy', get_template_directory_uri().'/js/jquery.tipsy.js'); ?>		
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="icon" type="image/x-icon" href="<?php echo ot_get_option('favicon_uploaded', get_template_directory_uri().'/images/favicon.png')?>">	
	
	<?php wp_head(); ?>
	
	

</head>
<body <?php body_class(); ?>>
  <div id="wrapper"<?php echo (ot_get_option('wrapper_style')=='full_width'? ' class="full_wrapper"' : '');?>>
  
  	<!-- Container -->
	<div class="container">
	
		<div class="header row">
			<div class="eight columns header_left">
				<?php  $logo = ot_get_option('logo_upload');
					   $top_margin = ot_get_option('logo_top_margin');
					   $left_margin = ot_get_option('logo_left_margin');
					   if(isset($top_margin) && is_array($top_margin)){
					   		$logo_extra_style = ($top_margin[0] || $left_margin[0]) ? 1 : 0;
					   }else{
					   		$logo_extra_style ='';
					   }
					   
				if($logo) { ?>
				<a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
					<img src="<?php echo $logo; ?>" <?php echo $logo_extra_style ? "style='". ($top_margin[0] ? 'margin-top: '.$top_margin[0].$top_margin[1].';' : '') . ($left_margin[0] ? 'margin-left: '.$left_margin[0].$left_margin[1].';' : '')."'" : ""; ?> alt="<?php bloginfo('name'); ?>"/>
				</a>
				<?php } else { ?>
				<h1 class="logo" <?php echo $logo_extra_style ? "style='". ($top_margin[0] ? 'margin-top: '.$top_margin[0].$top_margin[1].';' : '') . ($left_margin[0] ? 'margin-left: '.$left_margin[0].$left_margin[1].';' : '')."'" : ""; ?>>
					<a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a>
					<div class="tagline"><?php echo get_bloginfo ( 'description' ); ?></div>
				</h1>
				<?php } ?>
			</div>
			<div class="eight columns">
				<div class="header_right">
					<div class="header_contacts clearfix">
					<?php if($header_phone = ot_get_option('header_phone')){?>
						<div class="header_phone"><?php echo $header_phone;?></div>
					<?php }  ?>
					<?php if($header_email = ot_get_option('header_email')){?>
						<div class="header_mail"><?php echo $header_email;?></div>
					<?php }  ?>
					</div>
					<div class="header_soc_search clearfix">
						<div class="header_search">
							<form class="search" action="<?php echo home_url(); ?>/" method="get">
								<button class="button_search"></button>
								<input name="s" id="s" type="text" value="<?php echo ($s ? $s : __('Search', 'Aqua').'...'); ?>" onclick="this.value = '';"></span>
							</form>
						</div>
						
				<?php if(is_array($header_icons = ot_get_option('header_icons'))){
							$header_icons = array_reverse($header_icons);							
							foreach($header_icons as $header_icon){
								echo "<a href='". ( $header_icon['icons_service']!='rss' ? $header_icon['icons_url'] : get_bloginfo('rss2_url') )."' class='header_soc_". $header_icon['icons_service'] ."' title='". $header_icon['title'] ."'>". $header_icon['icons_service'] ."</a>";			
							}
						}
				?>
						

					</div>				
				</div>
			</div>
		</div>
		
		<!-- Main Navigation -->
		<div class="row no_bm">
			<div class="<?php echo get_theme_mod('main_menu_style'); ?> sixteen columns">
			
			<?php wp_nav_menu( array(
					'theme_location'=> 'main_navigation', 
					'container_id' 	=> 'menu', 
					'menu_class' 	=> '', 
					'walker' 		=> new boc_Menu_Walker,
					'fallback_cb'   => 'menuFallBack',
					'items_wrap' => '<ul><li><a href="'.home_url('/').'"><span class="home_icon"></span></a></li>%3$s</ul>',
			));?>
			
			<?php wp_nav_menu( array(
					'theme_location'=> 'main_navigation', 
					'container' 	=> '', 
					'menu_class' 	=> '', 
					'walker' 		=> new boc_Menu_Select_Walker,
					'fallback_cb'   => 'menuSelectFallBack',
					'items_wrap' => '<select id="select_menu" onchange="location = this.value"><option value="">'.__('Select Page', 'Aqua').'</option>%3$s</select>',
			));?>							
						
			</div>
		</div>
		<!-- Main Navigation::END -->