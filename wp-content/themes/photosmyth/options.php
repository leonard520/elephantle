<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {
	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = 'PhotoSmyth';
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {
	
	// Test data
	$test_array = array("one" => "1","two" => "2","three" => "3","four" => "4","five" => "5");
	$homelayout_array = array("one" => "Mag Pro","two" => "Mag lite","three" => "Mag","four" => "Standard Blog");
	$magpro_slider_start = array("false" => "No","true" => "Yes");
	$magpro_mini_slider_show = array("false" => "No","true" => "Yes");	
	$homecat_array = array("hori" => "Horizontal Layout","verti" => "Vertical Layout");
	
	
	// Multicheck Array
	$multicheck_array = array("one" => "French Toast", "two" => "Pancake", "three" => "Omelette", "four" => "Crepe", "five" => "Waffle");
	
	// Multicheck Defaults
	$multicheck_defaults = array("one" => "1","five" => "1");
	
	// Background Defaults
	
	$background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat','position' => 'top center','attachment'=>'scroll');
	
	
	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri(). '/admin/images/';
		
	$options = array();
		
		
							
	$options[] = array( "name" => "country1",
						"type" => "innertabopen");	

		$options[] = array( "name" => __("Select a Skin", 'PhotoSmyth' ),
							"type" => "groupcontaineropen");	

				$options[] = array( "name" => __("Select a Skin", 'PhotoSmyth' ),
										"desc" => __("Images for skins.", 'PhotoSmyth' ),
										"id" => "skin_style",
										"type" => "images",
										"std" => "darky",
										"options" => array(
											'PhotoSmyth' => $imagepath . 'Teal.png',
											'darky' => $imagepath . 'darky.png',)
										);						

										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Single Page Settings", 'PhotoSmyth' ),
							"type" => "groupcontaineropen");	
							
					$options[] = array( "name" => __("Show Featured Image?", 'PhotoSmyth' ),
										"desc" => __("Select yes if you want to show featured image as header.", 'PhotoSmyth' ),
										"id" => "show_featured_image_single",
										"std" => "false",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Ratings?", 'PhotoSmyth' ),
										"desc" => __("Select yes if you want to show ratings under post title.", 'PhotoSmyth' ),
										"id" => "show_rat_on_single",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);										
										
					$options[] = array( "name" => __("Show Posted by and Date?", 'PhotoSmyth' ),
										"desc" => __("Select yes if you want to show Posted by and Date under post title.", 'PhotoSmyth' ),
										"id" => "show_pd_on_single",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);											
										
					$options[] = array( "name" => __("Show Categories and Tags?", 'PhotoSmyth' ),
										"desc" => __("Select yes if you want to show categories under post title.", 'PhotoSmyth' ),
										"id" => "show_cats_on_single",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
										
					$options[] = array( "name" => __("Show Social Share Buttons?", 'PhotoSmyth' ),
										"desc" => __("Select yes if you want to show social buttons under post title.", 'PhotoSmyth' ),
										"id" => "show_socialbuts_on_single",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);																	

					$options[] = array( "name" => __("Show Author Bio", 'PhotoSmyth' ),
										"desc" => __("Select yes if you want to show Author Bio Box on single post page.", 'PhotoSmyth' ),
										"id" => "show_author_bio",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show RSS Box", 'PhotoSmyth' ),
										"desc" => __("Select yes if you want to show RSS box on single post page.", 'PhotoSmyth' ),
										"id" => "show_rss_box",
										"std" => "true",
										"type" => "select",
										"options" => $magpro_slider_start);		
										
					$options[] = array( "name" => __("Show Social Box", 'PhotoSmyth' ),
										"desc" => __("Select yes if you want to show social box on single post page.", 'PhotoSmyth' ),
										"id" => "show_social_box",
										"std" => "true",
										"type" => "select",
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Next/Previous Box", 'PhotoSmyth' ),
										"desc" => __("Select yes if you want to show Next/Previous box on single post page.", 'PhotoSmyth' ),
										"id" => "show_np_box",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
		$options[] = array( "type" => "groupcontainerclose");						
		
		
		
	$options[] = array( "type" => "innertabclose");	


	$options[] = array( "name" => "country2",
						"type" => "innertabopen");	
						
		$options[] = array( "name" => __("Social Settings", 'PhotoSmyth' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Twitter", 'PhotoSmyth' ),
										"desc" => __("Enter your twitter id", 'PhotoSmyth' ),
										"id" => "twitter_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Redditt", 'PhotoSmyth' ),
										"desc" => __("Enter your reddit url", 'PhotoSmyth' ),
										"id" => "redit_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Delicious", 'PhotoSmyth' ),
										"desc" => __("Enter your delicious url", 'PhotoSmyth' ),
										"id" => "delicious_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Technorati", 'PhotoSmyth' ),
										"desc" => __("Enter your technorati url", 'PhotoSmyth' ),
										"id" => "technorati_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Facebook", 'PhotoSmyth' ),
										"desc" => __("Enter your facebook url", 'PhotoSmyth' ),
										"id" => "facebook_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Stumble", 'PhotoSmyth' ),
										"desc" => __("Enter your stumbleupon url", 'PhotoSmyth' ),
										"id" => "stumble_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Youtube", 'PhotoSmyth' ),
										"desc" => __("Enter your youtube url", 'PhotoSmyth' ),
										"id" => "youtube_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Flickr", 'PhotoSmyth' ),
										"desc" => __("Enter your flickr url", 'PhotoSmyth' ),
										"id" => "flickr_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("LinkedIn", 'PhotoSmyth' ),
										"desc" => __("Enter your linkedin url", 'PhotoSmyth' ),
										"id" => "linkedin_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Google", 'PhotoSmyth' ),
										"desc" => __("Enter your google url", 'PhotoSmyth' ),
										"id" => "google_id",
										"std" => "",
										"type" => "text");

							
		$options[] = array( "type" => "groupcontainerclose");											
														
	$options[] = array( "type" => "innertabclose");
	
	
	$options[] = array( "name" => "country3",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Custom Header", 'PhotoSmyth' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show custom Header?", 'PhotoSmyth' ),
										"desc" => __("Selecting yes will show custom header instead of slider", 'PhotoSmyth' ),
										"id" => "custom_header_home",
										"std" => "false",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);
										
		$options[] = array( "type" => "groupcontainerclose");						
						
		$options[] = array( "name" => __("Slider Settings", 'PhotoSmyth' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Select Category", 'PhotoSmyth' ),
										"desc" => __("Posts from this category will be shown in the slider.", 'PhotoSmyth' ),
										"id" => "magpro_slidercat",
										"std" => "true",
										"type" => "select",
										"options" => $options_categories);
					
					$options[] = array( "name" => __("Show slider on homepage", 'PhotoSmyth' ),
										"desc" => __("Select yes if you want to show slider on homepage.", 'PhotoSmyth' ),
										"id" => "show_magpro_slider_home",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);
										
					$options[] = array( "name" => __("Show slider on Single post page", 'PhotoSmyth' ),
										"desc" => __("Select yes if you want to show slider on Single post page.", 'PhotoSmyth' ),
										"id" => "show_magpro_slider_single",
										"std" => "false",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show slider on Pages", 'PhotoSmyth' ),
										"desc" => __("Select yes if you want to show slider on Pages.", 'PhotoSmyth' ),
										"id" => "show_magpro_slider_page",
										"std" => "false",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show slider on Category Pages", 'PhotoSmyth' ),
										"desc" => __("Select yes if you want to show slider on Category Pages.", 'PhotoSmyth' ),
										"id" => "show_magpro_slider_archive",
										"std" => "false",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);																														
										
					$options[] = array( "name" => __("How many slides?", 'PhotoSmyth' ),
										"desc" => __("Enter a number. Ex: 5 or 7", 'PhotoSmyth' ),
										"id" => "magpro_slidernumposts",
										"std" => "5",
										"class" => "mini",
										"type" => "text");										
										
		$options[] = array( "type" => "groupcontainerclose");	
						
	$options[] = array( "type" => "innertabclose");	
	
								

	$options[] = array( "name" => "country4",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Layout Settings", 'PhotoSmyth' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Select a homepage layout", 'PhotoSmyth' ),
										"desc" => __("Images for layout.", 'PhotoSmyth' ),
										"id" => "homepage_layout",
										"std" => "mag",
										"type" => "images",
										"options" => array(
											'mag' => $imagepath . 'mag.png',
											'standard' => $imagepath . 'standard.png')
										);					
										
		$options[] = array( "type" => "groupcontainerclose");		
						
	$options[] = array( "type" => "innertabclose");		
	


	
	$options[] = array( "name" => "country7",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Mag Settings", 'PhotoSmyth' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Ratings?", 'PhotoSmyth' ),
										"desc" => __("Select yes if you want to show ratings", 'PhotoSmyth' ),
										"id" => "show_ratings_mag",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Thumbnail?", 'PhotoSmyth' ),
										"desc" => __("Select yes if you want to show thumbnail in the post", 'PhotoSmyth' ),
										"id" => "show_postthumbnail_mag",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);														

										
		$options[] = array( "type" => "groupcontainerclose");								
						
	$options[] = array( "type" => "innertabclose");	
	
	$options[] = array( "name" => "country9",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Standard Blog Settings", 'PhotoSmyth' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Ratings?", 'PhotoSmyth' ),
										"desc" => __("Select yes if you want to show ratings", 'PhotoSmyth' ),
										"id" => "show_ratings_standard",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);		
										
					$options[] = array( "name" => __("Show Categories/Tags?", 'PhotoSmyth' ),
										"desc" => __("Select yes if you want to show categories and tags in posts", 'PhotoSmyth' ),
										"id" => "show_ctags_standard",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);														

										
		$options[] = array( "type" => "groupcontainerclose");								
						
	$options[] = array( "type" => "innertabclose");	
	
	$options[] = array( "name" => "country5",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Sidebar Settings", 'PhotoSmyth' ),
							"type" => "tabheading");
			
		
		$options[] = array( "name" => __("Sidebar Ad Settings", 'PhotoSmyth' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show 300x250 ads in sidebar?", 'PhotoSmyth' ),
										"desc" => __("Select yes if you want to show 300x250 ads in sidebar. If you select yes, go to widgets page and drag/drop the ads", 'PhotoSmyth' ),
										"id" => "show_sidebar_ads",
										"std" => "false",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);		
										
					$options[] = array( "name" => __("Show 125x125 ads in sidebar?", 'PhotoSmyth' ),
										"desc" => __("Select yes if you want to show 125x125 ads in sidebar. If you select yes, go to widgets page and drag/drop the ads", 'PhotoSmyth' ),
										"id" => "show_sidebar_ads_onetwofive",
										"std" => "false",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);											
										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Social Settings", 'PhotoSmyth' ),
							"type" => "groupcontaineropen");	

										
					$options[] = array( "name" => __("Show Twitter Updates?", 'PhotoSmyth' ),
										"desc" => __("Select yes if you want to show feedburner in sidebar.", 'PhotoSmyth' ),
										"id" => "show_twitter_updates",
										"std" => "true",
										"type" => "select",
										"options" => $magpro_slider_start);																												
																				
		$options[] = array( "type" => "groupcontainerclose");		
						
	$options[] = array( "type" => "innertabclose");		
	
		
							
						

							
		
	return $options;
}