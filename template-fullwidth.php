<?php
/**
 * Template Name: Full Width
 *
 * The full width page template.
 *
 * @package WordPress
 * @subpackage Third Wunder
 * @since Third Wunder 1.0
 */
get_header(); ?>
<!-- Site Container -->
<div id="site-content" class="container">
  <div id="site-container" class="row">

    <div id="primary" class="content-area col-xs-12 col-sm-12 col-md-12">
    	<main id="main" class="site-main" role="main" itemprop="mainContentOfPage">

    	<?php get_template_part( 'content/_breadcrumbs' ); ?>
    	<?php
      	while ( have_posts() ) { the_post();
      		get_template_part( 'content/content', 'page' );
      	}
    	?>
    	</main><!-- .site-main -->
    </div><!-- .content-area -->

  </div><!-- #site-container -->
</div><!-- #site-content -->
<?php get_footer(); ?>