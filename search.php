<?php
/**
 * Search Page
 *
 * @package WordPress
 * @subpackage Third Wunder
 * @since Third Wunder 1.0
 */
get_header(); ?>
<div id="primary" class="content-area col-xs-12 col-sm-9 col-md-9">
	<main id="main" class="site-main" role="main" itemprop="mainContentOfPage">
    <div id="page-archive" class="page-archive" <?= html_tag_schema('SearchResultsPage'); ?>>

      <?php get_template_part( 'content/_breadcrumbs' ); ?>

      <header class="page-header">
        <h1 class="page-title" itemprop="name"><?php printf( __( 'Search Results for: %s', 'mh' ), get_search_query() ); ?></h1>
      </header><!-- .page-header -->

      <?php if (have_posts()): ?>
			  <section id="author-posts" class="page-posts">

  			  <?php while ( have_posts() ) : the_post(); ?>
            <?php if(get_post_type()!="post"): ?>
      				<?php get_template_part( 'loop/content',get_post_type()  ); ?>
        		<?php else: ?>
          		  <?php get_template_part( 'loop/content', get_post_format() ); ?>
        		<?php endif; ?>
    			<?php endwhile; ?>
        </section><!-- .page-posts -->
        <footer class="page-footer">
          <?php tw_pagination(); ?>
      	</footer><!-- .page-footer -->
      <?php else :
          get_template_part( 'content/content', 'none' );
        endif;
      ?>
    </div><!-- #page-category -->
  </main><!-- .site-main -->
</div><!-- .content-area -->
<?php get_sidebar( 'sidebar' ); ?>

<?php get_footer(); ?>