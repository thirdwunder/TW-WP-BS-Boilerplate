<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since TW 1.0
 */
$theme_general_options = get_option('tw_theme_general_options') ? get_option('tw_theme_general_options') : null;
$primary_sidebar = $theme_general_options['enable_sidebar'];
get_header(); ?>
<?php if($primary_sidebar):?>
<div id="primary" class="content-area col-xs-12 col-sm-9 col-md-9">
<?php else: ?>
<div id="primary" class="content-area col-xs-12 col-sm-12 col-md-12">
<?php endif;?>
	<main id="main" class="site-main" role="main" itemprop="mainContentOfPage">

	<?php get_template_part( 'content/_breadcrumbs' ); ?>

	<?php
		while ( have_posts() ) : the_post();
		  get_template_part( 'content/content', get_post_format() );

      tw_post_nav();
      posts_nav_link();

      get_template_part('content/related-posts');

		  if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;


    endwhile;
	?>
  </main><!-- .site-main -->

</div><!-- .content-area -->
<?php if($primary_sidebar){get_sidebar( 'sidebar' );} ?>

<?php get_footer(); ?>