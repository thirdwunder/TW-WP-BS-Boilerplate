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
<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">

  <!-- Offcanvas Menu -->
  <nav id="menu-mobile" class="navmenu navmenu-default navmenu-fixed-right offcanvas" itemtype="http://schema.org/SiteNavigationElement">
    <a class="navmenu-brand" href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>" rel="home">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.png" alt="<?php bloginfo('name'); ?> Logo" />
      <span class="sr-only"><?php bloginfo('name'); ?></span>
    </a>

    <?php
       if ( has_nav_menu( 'mobile' ) ){
        	wp_nav_menu( array(
        		'menu'       => 'mobile',
        		'theme_location' => 'mobile',
        		'depth'      => 2,
        		'container'  => false,
        		'menu_class' => 'nav navmenu-nav', //
        		'fallback_cb' => 'wp_page_menu',
        		'walker' => new tw_wp_bootstrap_mobile_navwalker())
        	);
      	}
    ?>

    <?php
      $social_info   = tw_get_theme_social_options();
      if($social_info):
        $count = count($social_info);
      ?>
      <div class="mobile-contact-social">
       <h4 class=""><?php echo __('Connect with us','tw') ;?></h4>
        <ul>
          <?php foreach($social_info as $network=>$details): ?>
            <li class="width-<?php echo $count; ?>">
              <a class="contact-<?php echo $network; ?>" href="<?php echo $details['url']; ?>" target="_blank" title="<?php echo ucfirst($network); ?>"><i class="fa <?php echo $details['icon']; ?>"></i></a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

  </nav><!-- .offcanvas -->


  <!-- Site Header -->
  <header id="site-header" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
    <?php $top_menu = tw_is_top_menu_enabled();
      if($top_menu):
    ?>
    <nav id="menu-top" role="navigation" class="navbar navbar-default navbar-fixed-top hidden-xs" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
      <div class="container">
        <div class="navbar-collapse collapse navbar-responsive-collapse" >
        <?php
           if ( has_nav_menu( 'top' ) ){
            	wp_nav_menu( array(
            		'menu'       => 'top',
            		'theme_location' => 'top',
            		'depth'      => 2,
            		'container'  => false,
            		'menu_class' => 'nav navbar-nav navbar-right', //
            		'fallback_cb' => 'wp_page_menu',
            		'walker' => new tw_wp_bootstrap_navwalker())
            	);
          	}
        ?>
        </div><!-- /.navbar-collapse -->
      </div>
    </nav>
    <?php endif; ?>


    <nav id="menu-primary" role="navigation" class="<?php if($top_menu){ echo 'with-top';}?> navbar navbar-default navbar-fixed-top" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
      <div class="container">
        <div class="navbar-header">

          <!-- Mobile Menu Toggle -->
          <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu" data-canvas="body">
            <span class="sr-only"><?php _e('Navigation','mh'); ?></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button><!-- .navbar-toggle -->

          <!-- Mobile Search Toggle -->
          <button id="mobile-search-toggle" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-mobile-search">
            <span class="sr-only"><?php _e('Search','mh'); ?></span>
            <i class="fa fa-search"></i>
          </button><!-- .navbar-toggle -->



          <a class="navbar-brand navbar-brand-logo" href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>" rel="home">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.png" alt="<?php bloginfo('name'); ?>
            Logo" />
            <span class="sr-only"><?php bloginfo('name'); ?></span>
          </a> <!-- .navbar-brand -->

        </div><!-- .navbar-header -->

        <div class="navbar-collapse collapse navbar-responsive-collapse" >
        <?php
           if ( has_nav_menu( 'primary' ) ){
            	wp_nav_menu( array(
            		'menu'       => 'primary',
            		'theme_location' => 'primary',
            		'depth'      => 2,
            		'container'  => false,
            		'menu_class' => 'nav navbar-nav navbar-right', //
            		'fallback_cb' => 'wp_page_menu',
            		'walker' => new tw_wp_bootstrap_navwalker())
            	);
          	}
        ?>
        </div><!-- /.navbar-collapse -->

        <div id="main-mobile-search" class="collapse navbar-collapse navbar-responsive-collapse" >

          <form class="form-inline visible-xs" role="search" method="get" id="mobile-searchform" action="<?php echo home_url( '/' ); ?>">
              <div class="form-group">
                  <label class="screen-reader-text sr-only" for="s"><?php _e('Search for','mh');?>:</label>
                  <div class="input-group">

                    <input class="form-control "type="text" value="" name="s" id="s" placeholder="<?php _e('Search','mh'); ?>" />
          <!--           <span class="input-group-addon"><i class="fa fa-search"></i></span> -->
                    <div class="input-group-btn">
                          <button class="btn btn-default" type="submit" id="searchsubmit" ><i class="fa fa-search"></i></button>
                    </div>
                  </div>
              </div>

          </form>

        </div>

      </div><!-- .container-fluid -->
    </nav><!-- #menu-primary -->




  </header><!-- #site-header -->

