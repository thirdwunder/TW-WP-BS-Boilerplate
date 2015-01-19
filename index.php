<?php
/**
 * The main template file
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
        <div id="home-page" class="page-archive" <?php echo tw_html_tag_schema(); ?>>
        <?php if ( have_posts() ) : ?>

          <?php if ( is_home() && ! is_front_page() ) : ?>
    				<header class="page-header">
    					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
    				</header>
          <?php else: ?>
            <header class="page-header">
              <h1 class="page-title screen-reader-text"><?php bloginfo('name'); ?></h1>
              <div class="page-desc"><?php bloginfo('description'); ?></div>
            </header>
    			<?php endif; ?>

          <section id="author-posts" class="page-posts">
        <?php
    			while ( have_posts() ) : the_post();
    			  get_template_part( 'loop/content', get_post_format() );
    			endwhile;
          ?>
          </section>

          <footer class="page-footer">
            <?php tw_pagination(); ?>
          </footer><!-- .page-footer -->
          <?php
        else:
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