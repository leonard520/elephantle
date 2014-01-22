<?php
// Remove Extra Paragraphs in ShortCodes (explicit usage)
function prefix_remove_wpautop( $content ) {

	$content = do_shortcode( shortcode_unautop( $content ) );
    $content = preg_replace( '#^<\/p>|^<br />|<p>$#', '', $content );
    return $content;
}


// Add buttons for our shortcodes
function boc_add_buttons() {  
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )  
   {  
     add_filter('mce_external_plugins', 'add_plugin');  
     add_filter('mce_buttons_3', 'register_button');  
   }  
}


function register_button($buttons) {
   array_push($buttons, "heading","button", "checklist","highlight","tooltip","separator","accordion","tabs","big_title","feat_text","testimonials","separator","posts_carousel","portfolio_carousel","slider","table","price_table","message","person","icon","border","separator","column","column_row","separator","youtube","vimeo","separator");    
   return $buttons;
}

function add_plugin($plugin_array) {
   $plugin_array['heading'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['button'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['checklist'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['highlight'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['tooltip'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['accordion'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['tabs'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['big_title'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['feat_text'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['posts_carousel'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['portfolio_carousel'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['slider'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['table'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['price_table'] = get_template_directory_uri().'/js/customcodes.js'; 
   $plugin_array['border'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['message'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['testimonials'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['person'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['icon'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['column'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['column_row'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['youtube'] = get_template_directory_uri().'/js/customcodes.js';
   $plugin_array['vimeo'] = get_template_directory_uri().'/js/customcodes.js';
   return $plugin_array;
}



// Heading
add_shortcode('heading', 'shortcode_heading');
function shortcode_heading( $atts, $content = null ) {
	
	return '<h2 class="title"><span>'.do_shortcode($content).'</span></h2>';
}

// Diag border
add_shortcode('border', 'shortcode_border');
function shortcode_border( $atts, $content = null ) {
	
	$atts = shortcode_atts(
		array(
			'margin' => 'no',
		), $atts);
	$margin = (($atts["margin"]=='yes')||($atts["margin"]=='Yes')) ? " margined_div" : '';
	return '<div class="h10 divider_bgr'.$margin.'"></div>';
}

// Message
add_shortcode('message', 'shortcode_message');
function shortcode_message( $atts, $content = null ) {

	$atts = shortcode_atts(
		array(
			'type' => 'information',
		), $atts);	
	return '<div class="'.$atts['type'].' closable">'.do_shortcode($content).'</div>';
}

// Button Link
add_shortcode('button', 'shortcode_button');
function shortcode_button($atts, $content = null){

	$atts = shortcode_atts(
			array(
				'css_classes' => '',
				'href' => '',
				'target' => '',
			), $atts);	
	$target = ($atts['target'] ? " target='".$atts['target']."'" : '');
    return '<a href="'.$atts["href"].'" class="button '.$atts["css_classes"].'" '.$target.'>'.do_shortcode($content).'</a>';  
}

// ULists
add_shortcode('checklist', 'shortcode_checklist');
function shortcode_checklist( $atts, $content = null ) {
	
	$atts = shortcode_atts(
		array(
			'arrows' => 'no',
		), $atts);
	$arrowed = (($atts["arrows"]=='yes')||($atts["arrows"]=='Yes')) ? true : false;
	return $arrowed ? str_replace('<ul class="checked">', '<ul class="arrowed">', do_shortcode($content)) : $content;
}

// Highlight
add_shortcode('highlight', 'shortcode_highlight');
function shortcode_highlight( $atts, $content = null ) {
	
	$atts = shortcode_atts(
		array(
			'dark' => 'no',
		), $atts);
	$dark = (($atts["dark"]=='yes')||($atts["dark"]=='Yes')) ? true : false;
	$content = '<strong class="hilite">'.$content.'</strong>';
	return $dark ? str_replace('class="hilite"', 'class="hilite_dark"', do_shortcode($content)) : do_shortcode($content);
}


// Accordion
add_shortcode('accordion', 'shortcode_accordion');
function shortcode_accordion( $atts, $content = null ) {
	
	$atts = shortcode_atts(
		array(
			'title' => '',
			'is_open' => 'no',
		), $atts);
	$is_open = (($atts["is_open"]=='yes')||($atts["is_open"]=='Yes')) ? ' acc_is_open' : '';
	$content = '<div class="acc_item"><h4 class="accordion"><span class="acc_control'.$is_open.'"></span><span class="acc_heading">'.$atts["title"].'</span></h4><div class="accordion_content">'.$content.'</div></div>';
	return $content;
}


// Tooltip
add_shortcode('tooltip', 'shortcode_tooltip');
function shortcode_tooltip( $atts, $content = null ) {
	
	$atts = shortcode_atts(
		array(
			'title' => '',
		), $atts);
	$content = '<span class="aqua_tooltip" original-title="'.$atts['title'].'">'.do_shortcode($content).'</span>';
	return $content;
}


// Featured Text
add_shortcode('feat_text', 'shortcode_feat_text');
function shortcode_feat_text( $atts, $content = null ) {
	
	$atts = shortcode_atts(
		array(
			'title' => '',
			'icon'	=> '',
		), $atts);
		
	$content = '<div class="section_featured_texts"><span class="icon big_'.$atts['icon'].'"></span><h3>'.$atts['title'].'</h3><p>'.do_shortcode($content).'</p></div>';
	return $content;
}


// Tabs
add_shortcode('tabs', 'shortcode_tabs');
function shortcode_tabs( $atts, $content = null ) {
	
	$str = '<div class="tabs htabs">';
	foreach ($atts as $key => $tab) {
		$str .= '<a href="#' . $key . '">' . $tab . '</a>';
	}	
	$str .= '</div>';
	$str .= prefix_remove_wpautop(do_shortcode($content));
	
	return $str;
	
}

// Tab
add_shortcode('tab', 'shortcode_tab');
function shortcode_tab( $atts, $content = null ) {
		
	return '<div class="tab-content"  id="tab' . $atts['id'] . '">' . prefix_remove_wpautop(do_shortcode($content)) . '</div>';	
	
}

// Section Big Title
add_shortcode('big_title', 'shortcode_big_title');
function shortcode_big_title( $atts, $content = null ) {
		
	return '<div class="section_big_title">' . do_shortcode($content) . '</div>';	
	
}



// Columns
add_shortcode('column', 'shortcode_column');
function shortcode_column( $atts, $content = null ) {

	$atts = shortcode_atts(
		array(
        'width' => 'sixteen columns',
        'position' => '',
        'custom_class' => ''
        ), $atts);
        
    switch ($atts['width']){
    	case 'full':
    	
    	case 'sixteen columns':	
    		$width = "sixteen columns";
    		break;
    	
        case "3/4" :
        	$width = "twelve columns";
        	break; 
        	
    	case "1/2":
    		$width = "eight columns";
    		break;

        case "1/3" :
        	$width = "column one-third";
        	break;

        case "2/3" :
        	$width = "column two-thirds";
       		break;

        case "1/4" :
        	$width = "four columns";
        	break;   	
        		    	
        case "one" : $width = "one columns"; break;
        case "two" : $width = "two columns"; break;
        case "three" : $width = "three columns"; break;
        case "four" : $width = "four columns"; break;
        case "five" : $width = "five columns"; break;
        case "six" : $width = "six columns"; break;
        case "seven" : $width = "seven columns"; break;
        case "eight" : $width = "eight columns"; break;
        case "nine" : $width = "nine columns"; break;
        case "ten" : $width = "ten columns"; break;
        case "eleven" : $width = "eleven columns"; break;
        case "twelve" : $width = "twelve columns"; break;
        case "thirteen" : $width = "thirteen columns"; break;
        case "fourteen" : $width = "fourteen columns"; break;
        case "fifteen" : $width = "fifteen columns"; break;
        case "sixteen" : $width = "sixteen columns"; break;        	
        	
        	
    	default :
        	$width = "sixteen columns";
    }   
    
	switch ($atts['position']) {
        case "last" :
	        $position = "omega";
	        break;

        case "center" :
	        $position = "alpha omega";
	        break;

        case "" :
	        $position = "";
	        break;

        case "first" :
	        $position = "alpha";
	        break;
        default :
	        $position = 'alpha';
    }
        
    $content ='<div class="'.$width.' '.$atts["custom_class"].' '. $position.'">'.prefix_remove_wpautop(do_shortcode( $content )).'</div>';
    
    if($atts['position']=='last'){
    	$content .= '<br class="h10 clear"/>';
    } 
    
    return $content;
}




// Testimonials
add_shortcode('testimonials', 'shortcode_testimonials');
function shortcode_testimonials($atts, $content = null) {

	$atts = shortcode_atts(
		array(
        'heading' => '',
		'auto_scroll' => 'yes',
        ), $atts);
	
    $auto_scroll = (($atts["auto_scroll"]=='yes')||($atts["auto_scroll"]=='Yes')) ? ' auto_scroll' : '';    
        
    $str='';        
	$str .= '<h2 class="title"><span>'.$atts['heading'].'</span></h2>';
	$str .= '<!-- Testimonials -->
				<div class="testimonials">
					<div class="carousel_arrows_bgr"></div>
					<ul class="testimonials_carousel'.$auto_scroll.'">';
	$str .= do_shortcode($content);
	$str .= '</ul>
				</div>
				<!-- Testimonials::END -->';
	return $str;
}


// Testimonial
add_shortcode('testimonial', 'shortcode_testimonial');
function shortcode_testimonial($atts, $content = null) {
	
	$atts = shortcode_atts(
		array(
        'author' => '',
        'author_title' => '',
		'width' => '1/2',
        ), $atts);
        		
        
    switch ($atts['width']){
    	case 'full':
    	
    	case 'sixteen columns':	
    		$width = "sixteen columns";
    		break;
    	
        case "3/4" :
        	$width = "twelve columns";
        	break; 
        	
    	case "1/2":
    		$width = "eight columns";
    		break;

        case "1/3" :
        	$width = "column one-third";
        	break;

        case "2/3" :
        	$width = "column two-thirds";
       		break;

        case "1/4" :
        	$width = "four columns";
        	break;   	
        		    	
        case "one" : $width = "one columns"; break;
        case "two" : $width = "two columns"; break;
        case "three" : $width = "three columns"; break;
        case "four" : $width = "four columns"; break;
        case "five" : $width = "five columns"; break;
        case "six" : $width = "six columns"; break;
        case "seven" : $width = "seven columns"; break;
        case "eight" : $width = "eight columns"; break;
        case "nine" : $width = "nine columns"; break;
        case "ten" : $width = "ten columns"; break;
        case "eleven" : $width = "eleven columns"; break;
        case "twelve" : $width = "twelve columns"; break;
        case "thirteen" : $width = "thirteen columns"; break;
        case "fourteen" : $width = "fourteen columns"; break;
        case "fifteen" : $width = "fifteen columns"; break;
        case "sixteen" : $width = "sixteen columns"; break;        	
        	        	
    	default :
        	$width = "eight columns";
    }           
        
        
        
	$str = '';
	$str .= '<li class="'.$width.' alpha">
							<div class="testimonial_quote">
	                            <div class="quote_content">
	                                <p>'.$content.'</p>
	                                <span class="quote_arrow"></span>
	                            </div>
	                            <div class="quote_author"><div class="icon_testimonial">'.$atts['author'].'</div><span class="quote_author_description">'.$atts['author_title'].'</span>
	                            </div>
	                        </div>
	                    </li>';

	return $str;
}



// Youtube shortcode
add_shortcode('youtube', 'shortcode_youtube');
function shortcode_youtube($atts) {
	$atts = shortcode_atts(
		array(
			'id' => '',
			'width' => 600,
			'height' => 360
		), $atts);
	
		return '<div class="video-shortcode"><iframe title="YouTube video player" width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="http://www.youtube.com/embed/' . $atts['id'] . '" frameborder="0" allowfullscreen></iframe></div>';
}
	
// Vimeo shortcode
add_shortcode('vimeo', 'shortcode_vimeo');
function shortcode_vimeo($atts) {
	$atts = shortcode_atts(
		array(
			'id' => '',
			'width' => 600,
			'height' => 360
		), $atts);
	
		return '<div class="video-shortcode"><iframe src="http://player.vimeo.com/video/' . $atts['id'] . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" frameborder="0"></iframe></div>';
}


// Slider
add_shortcode('slider', 'shortcode_slider');
function shortcode_slider($atts, $content = null) {
	$str = '';
	$str .= '<div class="flexslider">';
	$str .= '<ul class="slides">';
	$str .= do_shortcode($content);
	$str .= '</ul>';
	$str .= '</div>';

	return $str;
}

// Slide
add_shortcode('slide', 'shortcode_slide');
function shortcode_slide($atts, $content = null) {
	
	$title = $atts['title'] ? " title='".$atts['title']."'" : '';
	$str = '';
	if(isset($atts['type']) && $atts['type'] == 'video') {
		$str .= '<li class="video">';
	} else {
		$str .= '<li class="pic">';
	}
	if($atts['link']):
	$str .= '<a href="'.$atts['link'].'"'.$title.' rel="prettyPhoto[gal]">';
	endif;
	if(isset($atts['type']) && $atts['type'] == 'video') {
		$str .= $content;
	} else {
		$str .= '<img src="'.$content.'" alt="" /><span class="img_overlay_zoom"></span>';
	}
	if($atts['link']):
	$str .= '</a>';
	endif;
	$str .= '</li>';

	return $str;
}


add_shortcode('posts_carousel', 'shortcode_posts_carousel');
function shortcode_posts_carousel($atts, $content = null) {

	extract(shortcode_atts(
		array(
			'heading' => 'Latest Posts',
			'post_type'=> 'post',
			'order_by'=> 'date',
			'order' => 'DESC',
			'limit' => 10,
			'meta' => "yes",
			'excerpt' => "yes",
			'excerpt_char_limit' => 64,
			'width' => "four columns",
			'exclude_current' =>'yes',
			'scroll_by'	=> 2,
		), $atts));
	
	$meta = (($meta=='yes')||($meta=='Yes')) ? true : false;	
	$show_excerpt = (($excerpt=='yes')||($excerpt=='Yes')) ? true : false;	
		
	$exclude_post = 0;
	if(($atts["exclude_current"]=='yes')||($atts["exclude_current"]=='Yes')){
		$exclude_post = get_the_ID();
	}	
	
	$wp_query = new WP_Query(
	    array(
	        'post_type' => array($post_type),
	    	'orderby'	=> $order_by,
	    	'order'		=> $order,
	        'showposts' => $limit,
	    	'post__not_in' => array($exclude_post),      
	        )
	    );
 	$str = '';

	if ( $wp_query->have_posts() ):
	 
	  	$str = '
	  		<div class="h10"></div>
		  	<h2 class="title"><span>'.$heading.'</span></h2>
				<div class="clear"></div>
	  			<div class="related_posts_section">
					<div class="carousel_arrows_bgr"></div>
					<ul id="posts_carousel">';
	  	
	    while( $wp_query->have_posts() ) : $wp_query->the_post();
			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($wp_query->post->ID), 'portfolio-thumb'); 
			$excerpt = get_the_excerpt();
			$short_excerpt = limitString($excerpt,$excerpt_char_limit);
			$str .='<li class="'.$width.'">';
			$id = $wp_query->post->ID;

			if(( function_exists( 'get_post_format' ) && get_post_format( $wp_query->post->ID ) != 'video')){
				$str .='<div class="pic"><a href="'. get_permalink().'">'.get_the_post_thumbnail($wp_query->post->ID,'portfolio-medium').'<div class="img_overlay"></div></a></div>'; 
			}
			// IF Post type is Video 
			elseif (( function_exists( 'get_post_format' ) && get_post_format( $wp_query->post->ID ) == 'video')  ) {	
				if($video_embed_code = get_post_meta($wp_query->post->ID, 'video_embed_code', true)) {				
		            $video_embed_code = str_replace("<iframe", "<div class='video_max_scale'><iframe", $video_embed_code);
		            $video_embed_code = str_replace("</iframe>", "</iframe></div>", $video_embed_code);
		            $str .= $video_embed_code;
				}										
			} // IF Post type is Video :: END 

			
			$str .='<h4><a href="'. get_permalink().'">'.get_the_title().'</a></h4>';
			$str .= ($meta ? '<div class="meta_date">'.get_the_date().'</div>' : '');
			$str .= ($show_excerpt ? '<p>'.$short_excerpt.'</p>': '');
			$str .='</li>';
	    endwhile;  // close the Loop
	            
	            $str .='</ul></div>
	            
	            		<script type="text/javascript">
							jQuery(document).ready(function($) {							
								$("#posts_carousel").jcarousel({
								   	scroll: ($(window).width() > 767 ? '.$scroll_by.' : 1),
								   	easing: "easeInOutExpo",
								   	animation: 600
								});
							});
				
							// Reload carousels on window resize to scroll only 1 item if viewport is small
						    jQuery(window).resize(function() {
						    	   var el = jQuery("#posts_carousel"), carousel = el.data("jcarousel"), win_width = jQuery(window).width();
						    	   var visibleItems = (win_width > 767 ? '.$scroll_by.' : 1);
						    	   carousel.options.visible = visibleItems;
						    	   carousel.options.scroll = visibleItems;
						    	   carousel.reload();
						    }); 
						</script>
						<!-- Featured Services Section::END -->	            
	            ';
	            
	            endif;
	            wp_reset_postdata();
	            return $str;
}

// Person
add_shortcode('person', 'shortcode_person');
function shortcode_person($atts, $content = null) {
	
	
	$str='
				<div class="pic person">
					'.($atts["picture_url"] ? '<img src="'.$atts["picture_url"].'">' : '<img src="'. get_template_directory_uri() .'/images/user.png">').'
					<h4>'.$atts["name"].'</h4>
					<p class="team_desc">'.$atts["title"].'</p>
				</div>';

	return $str;
}

// Icon
add_shortcode('icon', 'shortcode_icon');
function shortcode_icon($atts, $content = null) {
	
	
	$str='<span class="'.$atts["type"].'"></span>';
	return $str;
}

// Portfolio Items
add_shortcode('portfolio_carousel', 'shortcode_portfolio_carousel');
function shortcode_portfolio_carousel($atts, $content = null) {
	
		extract(shortcode_atts(
			array(
				'max_items' => 10,
				'order_by'=> 'date',
			), $atts));
	
		$projects = get_portfolio_items($max_items, $order_by); 
		
		$str = '';
		
		if($projects->have_posts()){
		
			$str.='	
				<div class="h10 clear"></div>
				<h2 class="title"><span>'.__("Portfolio Items", "Aqua").'</span></h2>
				<div class="clear"></div>
				<div class="portfolio_items_in_page">
					<div class="carousel_arrows_bgr"></div>
					<ul id="portfolio_carousel_page">';
						while($projects->have_posts()): $projects->the_post(); 
						if(has_post_thumbnail()): 
							$str.='
								<li class="four columns portfolio_item">
									<a href="'.get_permalink().'">
										<span class="pic">'.get_the_post_thumbnail().'<div class="img_overlay"></div></span>
										<h5>'.get_the_title().'</h5>
									</a>
								</li>';
						endif; endwhile;
						$str.='
					</ul>
				</div>
				<div class="h20 clear"></div>
						
				<script type="text/javascript">
					jQuery(document).ready(function() {
						jQuery("#portfolio_carousel_page").jcarousel({
							scroll: (jQuery(window).width() > 767 ? 4 : 1),
							easing: "easeInOutExpo",
							animation: 600
						});
					});	
					
					
					// Reload carousels on window resize to scroll only 1 item if viewport is small
					jQuery(window).resize(function() {
						 var el = jQuery("#portfolio_carousel_page"), carousel = el.data("jcarousel"), win_width = jQuery(window).width();
						   var visibleItems = (win_width > 767 ? 4 : 1);
						   carousel.options.visible = visibleItems;
						   carousel.options.scroll = visibleItems;
						   carousel.reload();
					});
				</script>';
		}
		
		return $str;

}



// Price table
add_shortcode('price_table', 'shortcode_price_table');
function shortcode_price_table($atts, $content = null) {

	$atts = shortcode_atts(
		array(
		'columns' => 3
        ), $atts);
		
	$str = '';
	$str .= '<div class="row price_table_holder col_'.$atts['columns'].'">';
	$str .= prefix_remove_wpautop(do_shortcode($content));
	$str .= '</div>';

	return $str;
}


// Price column
add_shortcode('price_column', 'shortcode_price_column');
function shortcode_price_column($atts, $content = null) {

	$atts = shortcode_atts(
		array(
		'title' => '',
		'type'  => '',
        ), $atts);
		
	$featured_class = '';
	if($atts['type'] == 'featured'){
		$featured_class = 'price_column_featured';
	}
	
	$str = '<div class="price_column '.$featured_class.'">';
	$str .= '<ul>';
	if($atts['title']){
		$str .= '<li class="price_column_title">'.$atts['title'].'</li>';
	}
	$str .= do_shortcode($content);
	$str .= '</ul>';
	$str .= '</div>';

	return $str;
}


// Price Amount
add_shortcode('price_amount', 'shortcode_price_amount');
function shortcode_price_amount($atts, $content = null) {
	$str = '';
	$str .= '<li class="price_amount">';
	$str .= do_shortcode($content);
	$str .= '</li>';

	return $str;
}

// Price Description
add_shortcode('price_desc', 'shortcode_price_desc');
function shortcode_price_desc($atts, $content = null) {
	$str = '';
	$str .= '<li class="price_desc">';
	$str .= do_shortcode($content);
	$str .= '</li>';

	return $str;
}


// Price Footer
add_shortcode('price_footer', 'shortcode_price_footer');
	function shortcode_price_footer($atts, $content = null) {
		$str = '';
		$str .= '<li class="price_footer">';
		$str .= do_shortcode($content);
		$str .= '</li>';

		return $str;
	}