<?php
/**
 * Category Archive Page
 *
 * @package WordPress
 * @subpackage Third Wunder
 * @since Third Wunder 1.0
 */
get_header(); ?>
<div id="primary" class="content-area col-xs-12 col-sm-9 col-md-9">
	<main id="main" class="site-main" role="main" itemprop="mainContentOfPage">
    <div id="page-category" class="page-archive" <?php echo html_tag_schema(); ?>>

      <?php get_template_part( 'content/_breadcrumbs' ); ?>

      <header class="page-header">
        <?php
          printf( __( '<h1 class="page-title">Category: %s</h1>', 'tw' ), single_cat_title( '', false ) );
          the_archive_description( '<div class="archive-meta">', '</div>' );
        ?>
      </header><!-- .page-header -->

      <?php
        if (have_posts()): ?>
			  <section id="category-posts" class="page-posts">
				<?php
  				while (have_posts()): the_post();
    				get_template_part( 'loop/content', get_post_format() );
          endwhile;
        ?>
        </section><!-- .page-posts -->
        <footer class="page-footer">
          <?php tw_pagination(); ?>
      	</footer><!-- .page-footer -->
      <?php else:
        get_template_part( 'content/content', 'none' );
        endif;
			?>

    </div><!-- #page-category -->
  </main><!-- .site-main -->
</div><!-- .content-area -->
<?php get_sidebar( 'sidebar' ); ?>

<?php get_footer(); ?>