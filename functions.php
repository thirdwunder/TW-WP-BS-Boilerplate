<?php

include_once('includes/wp-bootstrap-navwalker/wp_bootstrap_navwalker.php');
include_once('includes/tw-wp-core/helper-functions.php');
include_once('includes/tw-wp-core/wordpress-functions.php');
include_once('includes/tw-wp-core/theme-admin-settings.php');
include_once('includes/tw-wp-core/tw_wp_bootstrap_navwalker.php');


if(!class_exists('AT_Meta_Box')){
  require_once("includes/My-Meta-Box/meta-box-class/my-meta-box-class.php");
}

if(!class_exists('Tax_Meta_Class')){
  require_once("includes/Tax-Meta-Class/Tax-meta-class/Tax-meta-class.php");
}

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

/*
		if (!is_admin()) {
      wp_deregister_script('jquery');
      wp_register_script('jquery', 'http://code.jquery.com/jquery-1.10.2.min.js', false, false);
      wp_enqueue_script('jquery');
    }
*/

		wp_register_script( 'bootstrap', get_template_directory_uri().'/includes/bootstrap/dist/js/bootstrap.min.js', array('jquery'), null, true );

		wp_register_script( 'jasny', get_template_directory_uri().'/includes/jasny/dist/js/jasny-bootstrap.min.js', array('jquery'), null, true );

    wp_register_script( 'isotope', get_template_directory_uri().'/includes/isotope/dist/isotope.pkgd.min.js', array('jquery'), null, false );

		wp_register_script( 'holder', '//cdnjs.cloudflare.com/ajax/libs/holder/2.0/holder.js', array('jquery'), '2.0', true );
		//wp_register_script( 'tw_script', get_template_directory_uri() . '/js/tw_script.js', array('jquery'), null, true );

		wp_enqueue_script( 'bootstrap');
		wp_enqueue_script( 'jasny');
		wp_enqueue_script( 'isotope');
		//wp_enqueue_script( 'tw_script');
		wp_enqueue_script( 'holder');


	}
	add_action( 'wp_enqueue_scripts', 'tw_theme_js' );
}



/******************************************************
********************** Widgets ************************
******************************************************/

if(!function_exists('tw_register_sidebars')){
  function tw_register_sidebars() {

    //$mh_theme_widget_sidebar = get_option('mh_theme_widget_sidebar') ? !!get_option('mh_theme_widget_sidebar') : false;
    //if($mh_theme_widget_sidebar){
      register_sidebar(array(
      	'id' => 'primary',
      	'name' => 'Primary Sidebar',
      	'description' => 'Used on every page BUT the homepage page template.',
      	'before_widget' => '<div id="%1$s" class="widget %2$s">',
      	'after_widget' => '</div>',
      	'before_title' => '<h4 class="widget-title">',
      	'after_title' => '</h4>',
      ));
    //}


    $mh_theme_widget_footer = get_option('mh_theme_widget_footer') ? get_option('mh_theme_widget_footer') : 0;
    if($mh_theme_widget_footer>0){
      for($i=1; $i<=$mh_theme_widget_footer; $i++){
        register_sidebar(array(
        	'id' => 'footer-'.$i,
        	'name' => 'Footer Widgets '.$i,
        	'description' => 'Footer Widget Area '.$i,
        	'before_widget' => '<div id="%1$s" class="widget %2$s">',
        	'after_widget' => '</div>',
        	'before_title' => '<h4 class="widget-title">',
        	'after_title' => '</h4>',
        ));
      }
    }


  }
  add_action( 'widgets_init', 'tw_register_sidebars' );
}




