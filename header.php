<!DOCTYPE html>
<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" 						 content = "width=device-width, initial-scale=1.0" >
  <meta name="author" content="<?php echo bloginfo('name') ;?>">
  <title><?php wp_title( '|', true, 'right' ); ?></title>

  <!-- wordpress head functions -->
  <?php wp_head(); ?>
  <!-- end of wordpress head -->

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/includes/html5shiv/dist/html5shiv.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/includes/respond/dest/respond.min.js"></script>
  <![endif]-->

  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
</head>
<body <?php body_class(); ?>>

  <!-- Offcanvas Menu -->
  <div id="menu-mobile" class="navmenu navmenu-default navmenu-fixed-right offcanvas">
    <a class="navmenu-brand" href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>" rel="home">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.png" alt="<?php bloginfo('name'); ?> Logo" />
      <span class="sr-only"><?php bloginfo('name'); ?></span>
    </a>
  </div><!-- .offcanvas -->


  <!-- Site Header -->
  <header id="site-header" role="banner">
    <nav id="menu-primary" role="navigation">
      <div class="navbar navbar-default navbar-fixed-top ">
        <div class="container">

            <div class="navbar-header">

              <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu" data-canvas="body">
                <span class="sr-only"><?php _e('Navigation','mh'); ?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

              <a class="navbar-brand" href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>" rel="home">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.png" alt="<?php bloginfo('name'); ?> Logo" />
                <span class="sr-only"><?php bloginfo('name'); ?></span>
              </a>
            </div> <!-- navbar-header -->

            <div class="navbar-collapse collapse navbar-responsive-collapse">
            <?php
              if ( has_nav_menu( 'primary' ) ){
              	wp_nav_menu( array(
              		'menu'       => 'primary',
              		'theme_location' => 'primary',
              		'depth'      => 2,
              		'container'  => false,
              		'menu_class' => 'nav navbar-nav nav-justified', //navbar-right
              		'fallback_cb' => 'wp_page_menu',
              		'walker' => new mh_wp_bootstrap_navwalker())
              	);
            	}
            ?>
            </div><!-- /.navbar-collapse -->


        </div><!-- .container -->
      </div><!-- navbar-default -->
    </nav><!-- #menu-primary -->
  </header><!-- #site-header -->

  <!-- Site Container -->
  <div id="site-content">
    <div id="site-container" class="container">