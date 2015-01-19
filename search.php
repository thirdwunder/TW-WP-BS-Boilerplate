<?php
/**
 * Search Page
 *
 * @package WordPress
 * @subpackage Third Wunder
 * @since Third Wunder 1.0
 */
$primary_sidebar = tw_is_sidebar_enabled();
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
        <div id="page-archive" class="page-archive" <?php echo tw_html_tag_schema('SearchResultsPage'); ?>>

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
    <?php if($primary_sidebar){get_sidebar( 'sidebar' );} ?>

  </div><!-- #site-container -->
</div><!-- #site-content -->
<?php get_footer(); ?>