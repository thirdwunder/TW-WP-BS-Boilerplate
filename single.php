<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since TW 1.0
 */

get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main col-xs-12 col-sm-9 col-md-9" role="main">
	<?php
		while ( have_posts() ) : the_post();
		  get_template_part( 'content/content', get_post_format() );

		  if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

      tw_post_nav();
    endwhile;
	?>
  </main><!-- .site-main -->


  <?php get_sidebar( 'sidebar' ); ?>

</div><!-- .content-area -->

<?php get_footer(); ?>