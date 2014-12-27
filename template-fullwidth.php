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

<?php get_footer(); ?>