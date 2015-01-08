<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage Third Wunder
 * @since Third Wunder 1.0
 */
 get_header();
?>
<div id="primary" class="content-area col-xs-12 col-sm-12 col-md-12">

	<main id="main" class="site-main" role="main" itemprop="mainContentOfPage">

	<?php get_template_part( 'content/_breadcrumbs' ); ?>

  <article <?php post_class(); ?> <?php echo tw_html_tag_schema(); ?>>
    <header class="page-header">
  		<h1 class="entry-title"><?php _e("Ooops! That's embarrassing!",'tw'); ?></h1>
  	</header><!-- .entry-header -->

    <div class="page-content" itemprop="text">
      <p><?php _e("We couldn't find the page what you were looking for!",'tw');?></p>

      <p><?php _e("Try a search to find what you were looking for!",'tw');?></p>

      <?php get_template_part('searchform'); ?>
    </div>
    <footer class="page-footer">

    </footer>
  </article>

	</main><!-- .site-main -->
</div><!-- .content-area -->
<?php if($primary_sidebar){get_sidebar( 'sidebar' );} ?>

<?php get_footer(); ?>