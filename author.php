<?php
/**
 * Author Page
 *
 * @package WordPress
 * @subpackage Third Wunder
 * @since Third Wunder 1.0
 */
$theme_general_options = get_option('tw_theme_general_options') ? get_option('tw_theme_general_options') : null;
$primary_sidebar = $theme_general_options['enable_sidebar'];
get_header(); ?>
<!-- Site Container -->
<div id="site-content" class="container">
  <div id="site-container" class="row">

    <?php if($primary_sidebar):?>
    <div id="primary" class="content-area col-xs-12 col-sm-8 col-md-9">
    <?php else: ?>
    <div id="primary" class="content-area col-xs-12 col-sm-12 col-md-12">
    <?php endif;?>
    	<main id="main" class="site-main" role="main" itemprop="mainContentOfPage">

    	  <?php if ( have_posts() ) : the_post(); ?>
        <div id="page-author" class="page-archive" <?php echo tw_html_tag_schema(); ?>>

          <?php get_template_part( 'content/_breadcrumbs' ); ?>

          <header class="page-header">
        		<h1 class="page-title">
          		<?php printf( __( 'All posts by %s', 'mh' ), '<span class="vcard itemprop="name""><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me" itemprop="url">' . get_the_author() . '</a></span>' ); ?>
        		</h1>
        		<?php rewind_posts(); ?>

        		<?php if ( get_the_author_meta( 'description' ) ) : ?>
      				<?php get_template_part( 'author-bio' ); ?>
      			<?php endif; ?>
        	</header><!-- .page-header -->


          <section id="author-posts" class="page-posts">
        	<?php while ( have_posts() ) : the_post(); ?>
    				<?php get_template_part( 'loop/content', get_post_format() ); ?>
    			<?php endwhile; ?>
          </section><!-- page-posts -->

        	<footer class="page-footer">
            <?php tw_pagination(); ?>
        	</footer><!-- .page-footer -->

        </div><!-- #page-author -->
        <?php endif; ?>

      </main><!-- .site-main -->
    </div><!-- .content-area -->
    <?php if($primary_sidebar){get_sidebar( 'sidebar' );} ?>

  </div><!-- #site-container -->
</div><!-- #site-content -->
<?php get_footer(); ?>