<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage Third Wunder
 * @since Third Wunder 1.0
 */
get_header(); ?>
<div id="primary" class="content-area col-xs-12 col-sm-9 col-md-9">
	<main id="main" class="site-main" role="main" itemprop="mainContentOfPage">
    <div id="home-page" class="page-archive" <?= html_tag_schema(); ?>>
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
<?php get_sidebar( 'sidebar' ); ?>
<?php get_footer(); ?>