<?php
/******************************************************
********************* Stylesheet **********************
******************************************************/
if( !function_exists( "tw_panorama_css" ) ) {
	function tw_panorama_css() {
  	if(is_singular('psp_projects')){
    	wp_register_style( 'tw-panorama-frontend', plugins_url().'/project-panorama/assets/css/psp-frontend.css',array(),'1.2.5', 'all' );
  		wp_register_style( 'tw-panorama-custom-css', plugins_url().'/project-panorama/assets/css/psp-custom.css.php',array(),'1.2.5', 'all' );
  		wp_enqueue_style( 'tw-panorama-frontend' );
  		wp_enqueue_style( 'tw-panorama-custom-css' );
  	}
	}
	add_action( 'wp_enqueue_scripts', 'tw_panorama_css' );
}

/******************************************************
********************* Javascript **********************
******************************************************/
if( !function_exists( "tw_panorama_js" ) ) {
	function tw_panorama_js() {
  	if(is_singular('psp_projects')){
    	wp_register_script( 'tw-psp-frontend-lib', plugins_url() . '/project-panorama/assets/js/psp-frontend-lib.min.js', array('jquery'), '1.2.5', true );
    	wp_register_script( 'tw-psp-frontend-behavior', plugins_url() . '/project-panorama/assets/js/psp-frontend-behavior.js', array('jquery'), '1.2.5', true );
  		wp_enqueue_script( 'tw-psp-frontend-lib');
  		wp_enqueue_script( 'tw-psp-frontend-behavior');
  	}

	}
	add_action( 'wp_enqueue_scripts', 'tw_panorama_js' );
}


function tw_panorama_add_ie_html5_shim () {
    echo '<!--[if lte IE 9]>';
    echo '<script src="<?php echo plugins_url(); ?>/project-panorama/assets/js/html5shiv.min.js"></script>';
    echo '<script src="<?php echo plugins_url(); ?>/project-panorama/assets/js/css3-mediaqueries.js"></script>';
    echo '<![endif]-->';
    echo '<!--[if IE]>';
    echo '<link rel="stylesheet" type="text/css" src="<?php echo plugins_url(); ?>/project-panorama/assets/css/ie.css">';
    echo '<![endif]-->';
}
add_action('wp_head', 'tw_panorama_add_ie_html5_shim');



function tw_panorama_class_names( $classes ) {
	if(is_singular('psp_projects')){
  	error_log('body class');
  	$classes[] = 'psp-standalone-page';
	}
	return $classes;
}
add_filter( 'body_class', 'tw_panorama_class_names' );