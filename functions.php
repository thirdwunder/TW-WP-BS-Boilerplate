<?php
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if(!class_exists('Mobile_Detect')){
  require_once 'includes/Mobile-Detect/Mobile_Detect.php';
}
if(!class_exists('AT_Meta_Box')){
  require_once("includes/My-Meta-Box/meta-box-class/my-meta-box-class.php");
}
if(!class_exists('Tax_Meta_Class')){
  require_once("includes/Tax-Meta-Class/Tax-meta-class/Tax-meta-class.php");
}

include_once('includes/wp-bootstrap-navwalker/wp_bootstrap_navwalker.php');
include_once('includes/tw-wp-core/tw_helper_functions.php');
include_once('includes/tw-wp-core/tw_wp_functions.php');
include_once('includes/tw-wp-core/tw_theme_admin_settings.php');
include_once('includes/tw-wp-core/tw_wp_bootstrap_navwalker.php');
include_once('includes/tw-wp-core/tw_wp_widgets.php');
include_once('includes/tw-wp-core/tw_wp_shortcodes.php');
include_once('includes/tw-wp-core/tw_lp_functions.php');

if( class_exists( 'BuddyPress' ) ) {
  if( is_plugin_active( 'buddypress/bp-loader.php' ) ) {
    include_once('includes/tw-wp-core/tw-bp-functions.php');
  }
}


if(class_exists('WooThemes_Sensei')){
  if( is_plugin_active( 'woothemes-sensei/woothemes-sensei.php' ) ) {
    include_once('includes/tw-wp-core/tw-woo-sensei.php');
  }
}

if(class_exists('TW_FAQ_Plugin')){
  if( is_plugin_active( 'tw-faq-plugin/tw-faq-plugin.php' ) ) {
    include_once('lib/tw-faq-plugin.php');
  }
}

if(class_exists('TW_Glossary_Plugin')){
  if( is_plugin_active( 'tw-glossary-plugin/tw-glossary-plugin.php' ) ) {
    include_once('lib/tw-glossary-plugin.php');
  }
}

/******************************************************
*************** Optimized Image Sizes *****************
******************************************************/
/**** xlarge ****/
tw_add_image_size('16x6', 'xlarge', true, false);

/**** large ****/
tw_add_image_size('16x6', 'large',  true, false);
tw_add_image_size('16x9', 'large',  true, false);

/**** Medium ****/
tw_add_image_size('16x6', 'medium',  true, false);
tw_add_image_size('16x9', 'medium',  true, false);
tw_add_image_size('4x3',  'medium',  true, false);

/**** Small ****/
tw_add_image_size('4x3',  'small',  true, false);
tw_add_image_size('square', 'small',  true, false);

/**** Small ****/
tw_add_image_size('square', 'xthumb', true, false);


/******************************************************
********************* Stylesheet **********************
******************************************************/
if( !function_exists( "tw_theme_css" ) ) {
	function tw_theme_css() {
		wp_register_style( 'tw-style', get_stylesheet_directory_uri().'/style.css',array(),null, 'all' );
		wp_enqueue_style( 'tw-style' );
	}
	add_action( 'wp_enqueue_scripts', 'tw_theme_css' );
}


/******************************************************
********************* Javascript **********************
******************************************************/
if( !function_exists( "tw_theme_js" ) ) {
	function tw_theme_js() {
		wp_register_script( 'tw_script', get_template_directory_uri() . '/assets/js/min/theme-min.js', array('jquery'), null, true );
		wp_enqueue_script( 'tw_script');
    if ( is_singular() && get_option( 'thread_comments' ) ){
      wp_enqueue_script( 'comment-reply' );
    }
	}
	add_action( 'wp_enqueue_scripts', 'tw_theme_js' );
}

