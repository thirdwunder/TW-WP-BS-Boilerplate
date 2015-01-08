<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage Third Wunder
 * @since Third Wunder 1.0
 */
$theme_general_options = get_option('tw_theme_general_options') ? get_option('tw_theme_general_options') : null;
$primary_sidebar = $theme_general_options['enable_sidebar'];
get_header(); ?>
<?php if($primary_sidebar):?>
<div id="primary" class="content-area col-xs-12 col-sm-8 col-md-9">
<?php else: ?>
<div id="primary" class="content-area col-xs-12 col-sm-12 col-md-12">
<?php endif;?>
	<main id="main" class="site-main" role="main" itemprop="mainContentOfPage">

	<?php get_template_part( 'content/_breadcrumbs' ); ?>

	<?php
  	while ( have_posts() ) { the_post();
  		get_template_part( 'content/content', 'page' );
  	}
	?>
	</main><!-- .site-main -->
</div><!-- .content-area -->
<?php if($primary_sidebar){get_sidebar( 'sidebar' );} ?>

<?php get_footer(); ?>