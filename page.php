<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage Third Wunder
 * @since Third Wunder 1.0
 */
get_header(); ?>

<div id="primary" class="content-area row">
	<main id="main" class="site-main col-xs-12 col-sm-9 col-md-9" role="main">
	<?php
  	while ( have_posts() ) { the_post();
  		get_template_part( 'content/content', 'page' );
  	}
	?>
	</main><!-- .site-main -->

  <?php get_sidebar( 'sidebar' ); ?>

</div><!-- .content-area -->

<?php get_footer(); ?>