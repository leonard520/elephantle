<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
wp_enqueue_script('pixiv-main');
$options = get_option('pixiv_options');
if ( is_singular() ) {
	wp_enqueue_script('comment-reply'); wp_enqueue_script('pixiv-comment');
	echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/style-comment.css" />';
}
wp_head();
if ( is_singular() && $options['comment_ajax_enable'] ) { ?>
<!--[if (gt IE 9)|!(IE)]><!-->
<script src="<?php echo get_template_directory_uri(); ?>/js/ajaxcomm.js" type="text/javascript"></script>
<!--<![endif]-->
<?php }
?>
</head>

<body <?php body_class(); ?>>
<header id="header">
	<div id="header_inner"<?php if( $options['header_menu_new'] == 'new' && $options['menu_type'] != 'slave' ) echo ' class="new"'; ?>>
		<hgroup class="alignleft">
			<h1 class="alignleft"><a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo('name'); ?>"><img src="http://www.elephantle.com/datepicker/logo.png"></img></a></h1>
			<?php if($options['header_tagline']) { echo '<h2 class="alignleft">'; echo bloginfo('description'); echo '</h2>'; } ?>
		</hgroup>
		
		<?php
		if ( $options['menu_type'] != 'main' ) { ?>
		<nav id="submenu" class="alignright"><?php wp_nav_menu(array('theme_location'=>'sub','depth'=>1)); ?></nav>
		<?php }
		if ( $options['menu_type'] != 'slave' ) { ?>
		<nav id="topmenu" <?php if( ! $options['header_menu_new'] ) echo 'class="alignleft"'; ?>><?php wp_nav_menu(array('theme_location'=>'main')); ?></nav>
		<?php } ?>
		
		
	</div>
</header>
<div style="height:30px;background:#5B3B86"></div>
<div id="content">
	<?php if( $options['header_ads_enable'] ) { ?>
	<div class="allround"><?php echo html_entity_decode($options['header_ads_code']); ?></div>
	<?php } ?>
	<div id="main_col" class="<?php if( is_single() ){ if( $options['single_layout'] != 'left_two') echo 'alignleft'; else echo 'alignright'; if ( $options['single_layout'] != 'both_three' && $options['single_side_width'] == 'normal' ) echo ' normal'; if( $options['single_layout'] == 'both_three') echo ' slim'; } elseif( is_home() ) { if( $options['index_layout'] != 'left_two') echo 'alignleft'; else echo 'alignright'; if( $options['index_layout'] == 'both_three') echo ' slim'; } ?>">